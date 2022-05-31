<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class C_detail extends Controller
{
    public function detail_ttr_reactive(Request $request)
    {
        $tahun_req = (int)$request->input("tahun");
        $bulan_req = (int)$request->input("bln");
        $witel = $request->input("kota");

        $column = DB::select(DB::raw(
        "SELECT COLUMN_NAME as kolom
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = 'ttr_reactive' AND TABLE_SCHEMA = 'masrare' /*KALO LOCAL RUN gapake  (AND TABLE_SCHEMA = 'masrare') */
        "));

        $nama_table = "TTR Reactive E2E WIBS";

        $data = DB::select(DB::raw(
            " SELECT *  
                       FROM ttr_reactive 
                       WHERE ttr_reactive.WITEL_TELKOM = '$witel' AND MONTH(STR_TO_DATE(ttr_reactive.STATUS_DATE, '%d-%m-%Y')) = $bulan_req
                       AND YEAR(STR_TO_DATE(ttr_reactive.STATUS_DATE, '%d-%m-%Y')) = $tahun_req "));
        // dd($column_ttr_reactive);
            
        return view('detail.ttr_reactive',compact('nama_table','column','data'));
    }

    public function detail_ttr_comp(Request $request)
    {
        $tahun_req = (int)$request->input("tahun");
        $bulan_req = (int)$request->input("bln");
        $witel = $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'ttr_comp' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "TTR Comp. FO Akses";
        $data = DB::select(DB::raw(
            " SELECT *  
                       FROM ttr_comp 
                       WHERE ttr_comp.witel = '$witel' AND MONTH(ttr_comp.resolveddate) = $bulan_req
                       AND YEAR(ttr_comp.resolveddate) = $tahun_req "));
        // dd($ttr_comp);
            
       return view('detail.ttr_comp',compact('nama_table','column','data')); 
    }

    public function detail_cnop_mmrr(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'cnop_mmrr' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "CNOP: Availability Access Compliance";

        $data = DB::select(DB::raw(
            "  SELECT *
            FROM cnop_mmrr 
            WHERE cnop_mmrr.Witel  = '$witel' AND MONTH (cnop_mmrr.Status_Date) = $bulan_req AND YEAR(cnop_mmrr.Status_Date) = $tahun_req 
             ")); 
        // dd($cnop_mmrr);
            
       return view('detail.cnop_minor_major_critical',compact('nama_table','column','data')); 
    }


    public function detail_cnop_minor(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'cnop_mmrr' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "CNOP 2.0: MTTRi Access Hub: 1 – 24 Site (16 Jam) (MINOR)";

        $data = DB::select(DB::raw(
            "  SELECT  *
            FROM cnop_mmrr 
            WHERE cnop_mmrr.Witel = '$witel' AND cnop_mmrr.severity_ne = 'Minor' AND MONTH (cnop_mmrr.Status_Date) = $bulan_req AND YEAR(cnop_mmrr.Status_Date) = $tahun_req
             "
             )); 
       
        // dd($data);
            
       return view('detail.cnop_minor_major_critical',compact('nama_table','column','data')); 
    }

    public function detail_cnop_major(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'cnop_mmrr' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "CNOP 2.0 :MTTRi Access Hub: 25 – 74 Site (8 Jam) (MAJOR)";

        $data = DB::select(DB::raw(
            "  SELECT  *
            FROM cnop_mmrr 
            WHERE cnop_mmrr.Witel = '$witel' AND cnop_mmrr.severity_ne = 'Major' AND MONTH (cnop_mmrr.Status_Date) = $bulan_req AND YEAR(cnop_mmrr.Status_Date) = $tahun_req
             "
             )); 
       
        // dd($cnop_major);
            
       return view('detail.cnop_minor_major_critical',compact('nama_table','column','data')); 
    }

    public function detail_cnop_critical(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'cnop_mmrr' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "CNOP 2.0 :MTTRi Access Hub: ≥ 75 Site (4 Jam) (CRITICAL)";

        $data = DB::select(DB::raw(
            "  SELECT  *
            FROM cnop_mmrr 
            WHERE cnop_mmrr.Witel = '$witel' AND cnop_mmrr.severity_ne = 'Critical' AND MONTH (cnop_mmrr.Status_Date) = $bulan_req AND YEAR(cnop_mmrr.Status_Date) = $tahun_req
             "
             )); 
       
        // dd($cnop_critical);
            
       return view('detail.cnop_minor_major_critical',compact('nama_table','column','data')); 
    }


    public function detail_cnop_sukses(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'cnop_delivery' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "CNOP Site Delivery Success Rate";
        
        $data = DB::select(DB::raw(
            "  SELECT  *
            FROM cnop_delivery
            WHERE cnop_delivery.WITEL = '$witel' AND MONTH (cnop_delivery.date_on_air) = $bulan_req AND YEAR(cnop_delivery.date_on_air) = $tahun_req 
            "
             )); 
       
        // dd($data);
            
       return view('detail.cnop_sukses',compact('nama_table','column','data')); 
    }

    public function detail_wib_olo(Request $request)
    {
        $tahun_req= (int)$request->input("tahun");
        $bulan_req= (int)$request->input("bln");
        $witel= $request->input("kota");

        $column = DB::select(DB::raw(
            "SELECT COLUMN_NAME as kolom
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'delivery_experience_wib' AND TABLE_SCHEMA = 'masrare'
            "));

        $nama_table = "MTTD OLO / Delivery Experience WIB: TTD Compliance";

        $data = DB::select(DB::raw(
            "  SELECT *
            FROM delivery_experience_wib
            WHERE delivery_experience_wib.`SERVICE WITEL` LIKE CONCAT('%','$witel' ,'%') AND MONTH (delivery_experience_wib.END) = $bulan_req AND YEAR(delivery_experience_wib.END) = $tahun_req "
             )); 
       
        // dd($column);
            
       return view('detail.wib_olo',compact('nama_table','column','data')); 
    }
}
