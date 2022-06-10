<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class C_index extends Controller
{
    public function index(Request $request)//url request
    {   
        // FILTER TAHUN DAN BULAN
        $now = Carbon::now();
        $bulan = $now->month; // WHERE MONTH(ttr_reactive_e2e_wibs.REPORTED_DATE) = $bulan
        $tahun = $now->year; // AND YEAR(ttr_reactive_e2e_wibs.REPORTED_DATE) = $tahun 
     
        $tahun_req = (int)$request->input("tahun");
        $bulan_req = (int)$request->input("bln");
       

        if ($tahun_req == null) {
            $tahun = $now->year;
        }else {
            $tahun = $tahun_req;
        };

        
        if ($bulan_req == null) {
            $bulan = $now->month;
        }else {
            $bulan = $bulan_req ;
        };
        
        //TTR Reactive E2E WIBS
        $ttr_reactive = DB::select(DB::raw(
            " SELECT list_witel.NAMA_WITEL, COUNT(ttr_reactive.INCIDENT) AS inc, /* inc menghitung incident yang di count */
            IFNULL(ROUND(AVG(ttr_reactive.TTR_FINAL),2),0) AS aver, /* aver ttr final dengan round 2 dibelakang koma dan jika null 0 */
            DENSE_RANK()OVER (ORDER BY aver) aver_rank,  /* ranking dari aver ttr final */
            IFNULL((SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'TTR_REACTIVE')/ IFNULL(ROUND(AVG(ttr_reactive.TTR_FINAL),2),0)*100,120) AS ach, /* Target(dari tabel witel)/aver x 100 jika null = 120 */
            (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'TTR_REACTIVE')AS TARGET /* Target(dari tabel witel sesuai dengan nama fungsi) */
                       FROM ttr_reactive /* dari table reactive */
                       RIGHT JOIN list_witel ON ttr_reactive.WITEL_TELKOM = list_witel.NAMA_WITEL AND MONTH(STR_TO_DATE(ttr_reactive.STATUS_DATE, '%d-%m-%Y')) = $bulan AND  YEAR(STR_TO_DATE(ttr_reactive.STATUS_DATE, '%d-%m-%Y')) = $tahun  /* mengaktifkan kondisi bulan dan tahun dan juga agar witel yang tidak memiliki nilai pada tabel ini tetap terlihat */
                       GROUP BY list_witel.NAMA_WITEL /* agar witel yang tidak memiliki nilai pada tabel ini tetap terlihat */
                       ORDER BY aver")); /* order berdasarkan aver */
        //TTR Comp. FO Akses
        $ttr_comp = DB::select(DB::raw(
            "SELECT list_witel.NAMA_WITEL, 
            IFNULL(((SUM(ttr_comp.compliance)/COUNT(ttr_comp.ticketid))*100),100) AS REAL_persen, /* REAL count(ticket id)/sum(compliance) x100 if null 100 */
            COUNT(ttr_comp.ticketid) AS COUNT_comply, /* REAL count(ticket id)/sum(compliance) x100 if null 100 */
            SUM(ttr_comp.compliance) AS sum_comply, /* REAL count(ticket id)/sum(compliance) x100 if null 100 */
            (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'TTR_COMP') AS Target,  /* Target(dari tabel witel sesuai dengan nama fungsi) */
            (IFNULL(((SUM(ttr_comp.compliance)/COUNT(ttr_comp.ticketid))*100),100))/(SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'TTR_COMP')*100 AS ACH,
            DENSE_RANK()OVER (ORDER BY ACH DESC) ACH_rank
            FROM ttr_comp
            RIGHT JOIN list_witel ON ttr_comp.witel = list_witel.NAMA_WITEL AND MONTH(ttr_comp.resolveddate) = $bulan AND  YEAR(ttr_comp.resolveddate) = $tahun
            GROUP BY list_witel.NAMA_WITEL 
            ORDER BY ACH DESC "));      
        // dd($ttr_comp);
        
        \DB::statement("SET SQL_MODE=''");//this is the trick use it just before your query    //JANGAN DIUBAH UNTUK MASALAH QUERY CNOP: Availability Access Compliance
        
        //CNOP: Availability Access Compliance
        $cnop_mmrr_lara = DB::select(DB::raw(
        "  SELECT list_witel.NAMA_WITEL, list_witel.TOTAL_SITE
        , cnop_mmrr.Status_Date , IFNULL(ROUND(AVG(cnop_mmrr.TTR_Finale),2),0) AS aver, IFNULL(COUNT(cnop_mmrr.Incident),0) AS jml_tiket,
        (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_AVIA') AS target
        FROM cnop_mmrr 
        RIGHT JOIN list_witel ON cnop_mmrr.Witel = list_witel.NAMA_WITEL  AND MONTH (cnop_mmrr.Status_Date) = $bulan AND YEAR(cnop_mmrr.Status_Date) = $tahun 
        GROUP BY list_witel.NAMA_WITEL
        ORDER
        BY list_witel.NAMA_WITEL ASC 
        "));
        // dd($cnop_mmrr_lara);

        // MEMPROSES DATA CNOP: Availability Access Compliance
        $array_cnop_mmr = [];   
        foreach ($cnop_mmrr_lara as $x ) {
            $avg_ttr = $x -> aver;
            $jml_tiket = $x -> jml_tiket;
                $outage = $jml_tiket * $avg_ttr;
                $total_site = (int) $x -> TOTAL_SITE;
                $jml_hari = Carbon::parse($x -> Status_Date)->daysInMonth;
                $formula = ((($total_site*$jml_hari*24)-$outage)/($total_site*$jml_hari*24)*100);
                $target = (double)$x -> target;
                $ach = ($formula/$target)*100;

            $array_cnop_mmr[] = [
                'witel' => $x -> NAMA_WITEL,
                'outage' => $outage,
                'real' =>  $formula,
                'target' => $target,
                'ach' => $ach,

            ]; 
        }   
        $array_cnop_mmr = collect($array_cnop_mmr)->sortByDesc('ach') ; //mengurutkan array berdasarkan ach secara desc
        // dd($array_cnop_mmr);

        //Membuat array kosong dan mendefinisikan buat ranking CNOP: Availability Access Compliance
        $array_cnop_mmr_rank = []; 
        $angka_rank = 0; //rank decalre no
        $rank_temp = ''; //rank decalre value temp

        foreach ($array_cnop_mmr as $x ){

            if($rank_temp !=  $x["ach"]){
                $angka_rank ++ ; 
            };
            $rank_now = $angka_rank;
            
            $array_cnop_mmr_rank[] = [
                'witel' => $x["witel"],
                'real' => $x["real"],
                'target' => $x["target"],
                'ach' => $x["ach"],
                'rank' => $rank_now
            ] ;
            $rank_temp = $x["ach"]; //Berdasarkan ACHIVMENT 
        }

        // CNOP 2.0: MTTRi Access Hub: 1 – 24 Site (16 Jam) (MINOR)
        $minor = DB::select(DB::raw(
            "  SELECT  
            list_witel.NAMA_WITEL, SUM(CASE WHEN cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END )AS inc, 
            SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END) AS sumofini,
            (IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END )*100,100)/(SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_MINOR'))*100 as ach,
            IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Minor'  
                    THEN 1 ELSE 0 END )*100,100) as Realisasi,
            (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_MINOR')AS Target,
            DENSE_RANK()OVER (ORDER BY ach DESC) ACH_rank
            FROM cnop_mmrr 
            RIGHT JOIN list_witel ON cnop_mmrr.Witel = list_witel.NAMA_WITEL  AND MONTH (cnop_mmrr.Status_Date) = $bulan AND YEAR(cnop_mmrr.Status_Date) = $tahun 
            GROUP BY list_witel.NAMA_WITEL
            ORDER BY ACH_rank ASC
             "));
        // dd($minor);

        // CNOP 2.0 :MTTRi Access Hub: 25 – 74 Site (8 Jam) (MAJOR)
        $major = DB::select(DB::raw(
            "  SELECT  
            list_witel.NAMA_WITEL, SUM(CASE WHEN cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END )AS inc, 
            SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END) AS sumofini,
            (IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END )*100,100)/(SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_MAJOR'))*100 as ach,
                    IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Major'  
                    THEN 1 ELSE 0 END )*100,100) as Realisasi,
            (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_MAJOR')AS Target,
            DENSE_RANK()OVER (ORDER BY ach DESC) ACH_rank
            FROM cnop_mmrr 
            RIGHT JOIN list_witel ON cnop_mmrr.Witel = list_witel.NAMA_WITEL AND MONTH (cnop_mmrr.Status_Date) = $bulan AND YEAR(cnop_mmrr.Status_Date) = $tahun 
            GROUP BY list_witel.NAMA_WITEL
            ORDER BY ACH_rank ASC
             "));
        // dd($major);

        // CNOP 2.0 :MTTRi Access Hub: ≥ 75 Site (4 Jam) (CRITICAL)
        $critical = DB::select(DB::raw(
            "  SELECT  
            list_witel.NAMA_WITEL, SUM(CASE WHEN cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END )AS inc, 
            SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END) AS sumofini,
            (IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END )*100,100)/(SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_CRITICAL'))*100 as ach,
            IFNULL(SUM(CASE 
            WHEN cnop_mmrr.TTR_Finale<=16 AND cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END)/SUM(CASE WHEN cnop_mmrr.severity_ne = 'Critical'  
                    THEN 1 ELSE 0 END )*100,100) as Realisasi,
            (SELECT TARGET FROM list_fungsi WHERE NAMA_FUNGSI = 'CNOP_CRITICAL')AS Target,
            DENSE_RANK()OVER (ORDER BY ach DESC) ACH_rank
            FROM cnop_mmrr 
            RIGHT JOIN list_witel ON cnop_mmrr.Witel = list_witel.NAMA_WITEL AND MONTH (cnop_mmrr.Status_Date) = $bulan AND YEAR(cnop_mmrr.Status_Date) = $tahun 
            GROUP BY list_witel.NAMA_WITEL
            ORDER BY ACH_rank ASC
             "));
        // dd($critical);

        //CNOP Site Delivery Success Rate
        $cnop_sukses = DB::select(DB::raw(
            " SELECT  
             list_witel.NAMA_WITEL, COUNT(cnop_delivery.ORDER_NIM) AS TOTAL_ORDER,
             SUM(CASE WHEN cnop_delivery.`SLA Status`='IN SLA' THEN 1 ELSE 0 END) AS IN_SLA,
             SUM(CASE WHEN cnop_delivery.`SLA Status`='OUT SLA' THEN 1 ELSE 0 END) AS OUT_SLA,
             IFNULL(SUM(CASE WHEN cnop_delivery.`SLA Status`='IN SLA' THEN 1 ELSE 0 END)/COUNT(cnop_delivery.ORDER_NIM),0.8)*100 AS REALISASI,
             DENSE_RANK()OVER (ORDER BY REALISASI DESC) REALISASI_rank
             FROM cnop_delivery
             RIGHT JOIN list_witel ON cnop_delivery.WITEL = list_witel.NAMA_WITEL AND MONTH (cnop_delivery.`ON Air Date`) = $bulan AND YEAR(cnop_delivery.`ON Air Date`) = $tahun
             GROUP BY list_witel.NAMA_WITEL
             ORDER BY REALISASI DESC 
             "));
        // dd($cnop_sukses);

        //MTTD OLO
        $wib_olo = DB::select(DB::raw(
            "SELECT  
            list_witel.NAMA_WITEL, 
            COUNT(delivery_experience_wib.WFM_ORDERID) AS TOTAL_ORDER,
            IFNULL(AVG(delivery_experience_wib.TTD_WITEL),8888888) AS AVG_TTD, /* ANGKA 888888 adalaha MEMAKSIMALKAN AVGTTD JIKA NULL*/
            SUM(CASE WHEN 
            delivery_experience_wib.TTD_WITEL
            <= 
            delivery_experience_wib.TARGET_WITEL THEN 1 ELSE 0 END) AS COMP,
            SUM(CASE WHEN 
            delivery_experience_wib.TTD_WITEL
            > 
            delivery_experience_wib.TARGET_WITEL THEN 1 ELSE 0 END) AS NOT_COMP,
            DENSE_RANK() OVER (ORDER BY AVG_TTD ASC) AVG_rank
            FROM delivery_experience_wib
            RIGHT JOIN list_witel ON delivery_experience_wib.`SERVICE WITEL` LIKE CONCAT('%', list_witel.NAMA_WITEL ,'%') AND MONTH (delivery_experience_wib.END) = $bulan AND YEAR(delivery_experience_wib.END) = $tahun 
            GROUP BY list_witel.NAMA_WITEL
            ORDER BY AVG_TTD ASC  "
        ));
        // dd($wib_olo);
        $olo_rank_x = 1;
        $array_wib_olo_awal = [];   
        foreach ($wib_olo as $x ) {
            
            if($x -> AVG_TTD ==  8888888){
                $sementara = 0; 
            }
            else{
                $sementara = $x -> AVG_TTD; 
            };

            $array_wib_olo_awal[] = [
                'NAMA_WITEL' => $x -> NAMA_WITEL,
                'TOTAL_ORDER' => $x -> TOTAL_ORDER,
                'AVG_TTD' => $sementara,
                'COMP' => $x -> COMP,
                'NOT_COMP' => $x -> NOT_COMP,
                'AVG_rank' => $x -> AVG_rank,

            ]; 
            
        }  
        $array_wib_olo_awal = collect($array_wib_olo_awal);
        // dd($array_wib_olo_awal);

        //Delivery Experience WIB: TTD Compliance
        $ttd_comp_wib = DB::select(DB::raw(
            " SELECT  
             list_witel.NAMA_WITEL, 
            COUNT(delivery_experience_wib.WFM_ORDERID) AS TOTAL_ORDER,
            SUM(CASE WHEN 
            delivery_experience_wib.TTD_WITEL
            <= 
            delivery_experience_wib.TARGET_WITEL THEN 1 ELSE 0 END) AS COMP,
            SUM(CASE WHEN 
            delivery_experience_wib.TTD_WITEL
            > 
            delivery_experience_wib.TARGET_WITEL THEN 1 ELSE 0 END) AS NOT_COMP,
             IFNULL(SUM(CASE WHEN 
            delivery_experience_wib.TTD_WITEL
            <= 
            delivery_experience_wib.TARGET_WITEL THEN 1 ELSE 0 END)/COUNT(delivery_experience_wib.WFM_ORDERID),0.8)*100 AS REALISASI,
             DENSE_RANK()OVER (ORDER BY REALISASI DESC) REALISASI_rank
             FROM delivery_experience_wib
            RIGHT JOIN list_witel ON delivery_experience_wib.`SERVICE WITEL` LIKE CONCAT('%', list_witel.NAMA_WITEL ,'%') AND MONTH (delivery_experience_wib.END) = $bulan AND YEAR(delivery_experience_wib.END) = $tahun 
            GROUP BY list_witel.NAMA_WITEL
             ORDER BY REALISASI DESC,  list_witel.NAMA_WITEL DESC
             "));
        // dd($ttd_comp_wib);



        // AMBIL WITEL DARI $ CNOP SUKSES
        //TTR COMP || CNOP AVAI
        // 'ttr_comp','array_cnop_mmr_rank','minor','major','critical','ttr_reactive'
        $rekap_witel = collect($cnop_sukses)->sortBy('NAMA_WITEL')->pluck('NAMA_WITEL')->all(); //WARN
        // ASSURANCE REKAP
        // VARIALBE REKAP RETURN 1 coloumn array yang sudah di sort by witel selanjutnya diproses di fungsi
        $rekap_ttr_comp_rank = collect($ttr_comp)->sortBy('NAMA_WITEL')->pluck('ACH_rank')->all(); 
        $rekap_ttr_comp_rank_value = collect($ttr_comp)->sortBy('NAMA_WITEL')->pluck('REAL_persen')->all(); 

        $rekap_array_cnop_mmr_rank = collect($array_cnop_mmr_rank)->sortBy('witel')->pluck('rank')->all(); 
        $rekap_array_cnop_mmr_rank_value = collect($array_cnop_mmr_rank)->sortBy('witel')->pluck('real')->all(); 

        $rekap_minor_rank = collect($minor)->sortBy('NAMA_WITEL')->pluck('ACH_rank')->all();
        $rekap_minor_rank_value = collect($minor)->sortBy('NAMA_WITEL')->pluck('Realisasi')->all();

        $rekap_major_rank = collect($major)->sortBy('NAMA_WITEL')->pluck('ACH_rank')->all(); 
        $rekap_major_rank_value = collect($major)->sortBy('NAMA_WITEL')->pluck('Realisasi')->all();

        $rekap_critical_rank = collect($critical)->sortBy('NAMA_WITEL')->pluck('ACH_rank')->all(); 
        $rekap_critical_rank_value = collect($critical)->sortBy('NAMA_WITEL')->pluck('Realisasi')->all(); 

        $rekap_ttr_reactive_rank = collect($ttr_reactive)->sortBy('NAMA_WITEL')->pluck('aver_rank')->all(); 
        $rekap_ttr_reactive_rank_value = collect($ttr_reactive)->sortBy('NAMA_WITEL')->pluck('aver')->all(); 
        // dd($rekap_ttr_reactive_rank_value);
        // dd($rekap_array_cnop_mmr_rank);

        for ($i=0 ; $i < count($rekap_witel)  ; $i++) { 
            
            $total_poin_full = 
            $rekap_ttr_comp_rank[$i]+$rekap_array_cnop_mmr_rank[$i]+$rekap_minor_rank[$i]+
            $rekap_major_rank[$i]+$rekap_critical_rank[$i]+$rekap_ttr_reactive_rank[$i];

            $assurance_rekap[] = [
                'NAMA_WITEL' => $rekap_witel[$i],
                'TTR_COMP' => $rekap_ttr_comp_rank[$i],
                'TTR_COMP_VALUE' => $rekap_ttr_comp_rank_value[$i],
                'CNOP_AVAIL' => $rekap_array_cnop_mmr_rank[$i],
                'CNOP_AVAIL_VALUE' => $rekap_array_cnop_mmr_rank_value[$i],
                'MINOR' => $rekap_minor_rank[$i],
                'MINOR_VALUE' => $rekap_minor_rank_value[$i],
                'MAJOR' => $rekap_major_rank[$i],
                'MAJOR_VALUE' => $rekap_major_rank_value[$i],
                'CRITICAL' => $rekap_critical_rank[$i],
                'CRITICAL_VALUE' => $rekap_critical_rank_value[$i],
                'TTR_REACTIVE' => $rekap_ttr_reactive_rank[$i],
                'TTR_REACTIVE_VALUE' => $rekap_ttr_reactive_rank_value[$i],
                'TOTAL_POIN' => $total_poin_full, 
            ]; 
        }        

        // sort byt total poin apabila jika sama sort by avaibilty 
        $assurance_rekap = collect($assurance_rekap)->sortBy('CNOP_AVAIL')->sortBy('TOTAL_POIN'); 
        // dd($assurance_rekap);

        $assu_rank =0;
        foreach ($assurance_rekap as $x ){
            
            $assu_rank ++ ; 
            $rank_now = $assu_rank;
            
            $assurance_rekap_rank[] = [
                'NAMA_WITEL' => $x["NAMA_WITEL"],
                'TTR_COMP' => $x["TTR_COMP"],
                'TTR_COMP_VALUE' => $x["TTR_COMP_VALUE"],
                'CNOP_AVAIL' => $x["CNOP_AVAIL"],
                'CNOP_AVAIL_VALUE' => $x["CNOP_AVAIL_VALUE"],
                'MINOR' => $x["MINOR"],
                'MINOR_VALUE' => $x["MINOR_VALUE"],
                'MAJOR' => $x["MAJOR"],
                'MAJOR_VALUE' => $x["MAJOR_VALUE"],
                'CRITICAL' => $x["CRITICAL"],
                'CRITICAL_VALUE' => $x["CRITICAL_VALUE"],
                'TTR_REACTIVE' => $x["TTR_REACTIVE"],
                'TTR_REACTIVE_VALUE' => $x["TTR_REACTIVE_VALUE"],
                'TOTAL_POIN' => $x["TOTAL_POIN"], 
                'RANK' =>  $rank_now
            ] ;

        }
        
        // dd($assurance_rekap_rank);




        //FULLFILLMENT REKAP
        //CNOPSUKSES || ARRAY WIB OLO || TTD COMP WIB
       
        $rekap_cnop_sukses_rank = collect($cnop_sukses)->sortBy('NAMA_WITEL')->pluck('REALISASI_rank')->all();
        $rekap_cnop_sukses_rank_value = collect($cnop_sukses)->sortBy('NAMA_WITEL')->pluck('REALISASI')->all();

        $rekap_array_wib_olo_awal_rank = collect($array_wib_olo_awal)->sortBy('NAMA_WITEL')->pluck('AVG_rank')->all();
        $rekap_array_wib_olo_awal_rank_value = collect($array_wib_olo_awal)->sortBy('NAMA_WITEL')->pluck('AVG_TTD')->all();

        $rekap_ttd_comp_wib_rank = collect($ttd_comp_wib)->sortBy('NAMA_WITEL')->pluck('REALISASI_rank')->all();
        $rekap_ttd_comp_wib_rank_value = collect($ttd_comp_wib)->sortBy('NAMA_WITEL')->pluck('REALISASI')->all();

        // dd( count($rekap_witel));
        


        for ($i=0 ; $i < count($rekap_witel)  ; $i++) { 
            
            $total_poin_full = $rekap_cnop_sukses_rank[$i]+$rekap_array_wib_olo_awal_rank[$i]+$rekap_ttd_comp_wib_rank[$i];

            $fullfilment_rekap[] = [
                'NAMA_WITEL' => $rekap_witel[$i],
                'CNOP_SUKSES' => $rekap_cnop_sukses_rank[$i],
                'CNOP_SUKSES_VALUE' => $rekap_cnop_sukses_rank_value[$i],
                'WIB_OLO' => $rekap_array_wib_olo_awal_rank[$i],
                'WIB_OLO_VALUE' => $rekap_array_wib_olo_awal_rank_value[$i],
                'TTD_COMP' => $rekap_ttd_comp_wib_rank[$i],
                'TTD_COMP_VALUE' => $rekap_ttd_comp_wib_rank_value[$i],
                'TOTAL_POIN' => $total_poin_full,
                
            ]; 
        }    
        $fullfilment_rekap = collect($fullfilment_rekap)->sortBy('TOTAL_POIN');
        // dd($fullfilment_rekap); 

        $full_rank =0;
        $full_temp ='';
        $rank_temp =1;
        foreach ($fullfilment_rekap as $x ){
            
            $full_rank ++ ; 
            if($full_temp !=  $x["TOTAL_POIN"]){
                $rank_now = $full_rank;
            }else{
                $rank_now = $rank_temp ;
            };
            
            $fullfilment_rekap_rank[] = [
                'NAMA_WITEL' => $x["NAMA_WITEL"],
                'CNOP_SUKSES' => $x["CNOP_SUKSES"],
                'CNOP_SUKSES_VALUE' => $x["CNOP_SUKSES_VALUE"],
                'WIB_OLO' => $x["WIB_OLO"],
                'WIB_OLO_VALUE' => $x["WIB_OLO_VALUE"],
                'TTD_COMP' =>$x["TTD_COMP"],
                'TTD_COMP_VALUE' =>$x["TTD_COMP_VALUE"],
                'TOTAL_POIN' => $x["TOTAL_POIN"],
                'RANK' =>  $rank_now
            ] ;

            $full_temp = $x["TOTAL_POIN"];
            $rank_temp = $full_rank;
        }
        

        // dd($bulan);
        $bulan_c = $bulan;

        // dd($fullfilment_rekap_rank);
        return view('index',compact('tahun','bulan_c','ttr_reactive','ttr_comp','array_cnop_mmr_rank','minor','major','critical','cnop_sukses','array_wib_olo_awal','ttd_comp_wib','assurance_rekap_rank','fullfilment_rekap_rank'));
    }
}
