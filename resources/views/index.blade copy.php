<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/assets/img/favicon.png">
    <title>PERFORMANCE </title>
    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}

    {{-- BARU --}}
    {{--
    <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js">
    </script> --}}
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/assets/css/material-dashboard.css?v=3.0.3" rel="stylesheet" />


    {{-- TAB PAN --}}
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
</head>

<body class="g-sidenav-hidden  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0"
                href=" https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/analytics.html "
                target="_blank">
                <img src="assets/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2 PRO</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white"
                        aria-controls="ProfileNav" role="button" aria-expanded="false">
                        <img src="assets/assets/img/team-3.jpg" class="avatar">
                        <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span>
                    </a>
                    <div class="collapse" id="ProfileNav" style="">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="../../pages/pages/profile/overview.html">
                                    <span class="sidenav-mini-icon"> MP </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="../../pages/pages/account/settings.html">
                                    <span class="sidenav-mini-icon"> S </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Settings </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="../../pages/authentication/signin/basic.html">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white "
                        aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                        <i class="material-icons-round opacity-10">dashboard</i>
                        <span class="nav-link-text ms-2 ps-1">Dashboards</span>
                    </a>
                    <div class="collapse show" id="dashboardsExamples">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white " href="#REKAP">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> REKAP </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white " href="#ASSURANCE">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> BEST ASSURANCE </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white " href="#FULLFILMENT">
                                    <span class="sidenav-mini-icon"> F </span>
                                    <span class="sidenav-normal  ms-2  ps-1">BEST FULLFILMENT </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
            id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path>
                                                    <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">DataTables</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Performance
                        <?php
                    $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    if (isset($_GET['tahun'])){
                        echo "{$bulan[Request::get('bln')-1]}, {$_GET['tahun']} ";
                    }else {
                        $month = date('n')-1;
                        $year=date('Y');
                        echo "$bulan[$month], $year ";
                     };
                    
                    ?>
                    </h6>
                </nav>
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Search here</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        <head>
            <br><br>
            <h1 align='center'>
                Performance <br>
                <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            if (isset($_GET['tahun'])){
                echo "{$bulan[Request::get('bln')-1]}, {$_GET['tahun']} ";
            }else {
                $month = date('n')-1;
                $year=date('Y');
                echo "$bulan[$month], $year ";
             };
            
            ?>
            </h1>
            <form id="add-bookmark" style="padding:20px;">
                <div class="row" id="REKAP">
                    <div class="col-md-3 ">

                        <label class="form-label">Bulan</label>
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control pb-4" required name="bln">
                                <?php
                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        $month = date('n')-1;
                        $jlh_bln=count($bulan);
                        for($c=0; $c<$jlh_bln; $c+=1){
                            $a = 1 + $c;
                            if (isset($_GET['bln'])) {
                                if($_GET['bln'] == $a){
                                echo"<option selected value='$a' > $bulan[$c] </option>";
                            }else {
                                echo"<option value='$a' > $bulan[$c] </option>";
                            }
                            }else {
                            if( $month+1 == $a){
                                echo"<option selected value='$a' > $bulan[$c] </option>";
                            }else {
                                echo"<option value='$a' > $bulan[$c] </option>";
                            }
                            }
                           
                            
                        }
                        ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tahun</label>
                        <div class="input-group input-group-outline my-3">
                            <?php
                            $now=date('Y');
                            echo "<select class='form-control pb-4' required  name=tahun>";
                            for ($a=$now;$a>=2022;$a--)
                            {
                                echo "<option value='$a'>$a</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                    </div>

                    <div class="listsearch-input" style="margin-left: 0px; ">
                        <button class="btn btn-outline-primary"></i>Search</button>

                    </div>
                </div>
            </form>
        </head>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <h1>REKAP</h1>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">
                                <b>BEST ASSURANCE
                                    <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            if (isset($_GET['tahun'])){
                echo "{$bulan[Request::get('bln')-1]}, {$_GET['tahun']} ";
            }else {
                $month = date('n')-1;
                $year=date('Y');
                echo "$bulan[$month], $year ";
             };
            
            ?>
                                </b>
                            </h5>
                        </div>
                        <style>
                            td {
                                text-align: center;
                                vertical-align: middle;
                            }

                            th {

                                padding-left: 0px;
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-bottom: 0px;

                                width: 50%;
                                text-align: center;
                                vertical-align: middle;
                            }
                        </style>
                        <div class="table-responsive">
                            <table class="table table-flush" id="">
                                <thead class="thead-light">
                                    <tr>
                                        <th rowspan="2">NO</th>
                                        <th rowspan="2">WITEL</th>
                                        <th colspan="2">TTR Comp. FO Akses</th>
                                        <th colspan="2">CNOP: Availability <br>
                                            Access Compliance</th>
                                        <th colspan="2">CNOP 2.0: MTTRi Access <br>
                                            Hub: 1 – 24 Site (16 Jam) <br>
                                            (MINOR)</th>
                                        <th colspan="2">CNOP 2.0 :MTTRi Access <br> Hub: 25 – 74 Site (8 Jam) <br>
                                            (MAJOR)</th>
                                        <th colspan="2">CNOP 2.0 :MTTRi Access <br> Hub: ≥ 75 Site (4 Jam) <br>
                                            (CRITICAL)</th>
                                        <th colspan="2">TTR Reactive <br> E2E WIBS</th>
                                        <th rowspan="2">TOTAL POIN</th>
                                        <th rowspan="2">RANK</th>

                                    </tr>
                                    <tr>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assurance_rekap_rank as $data)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td>{{ $data ['NAMA_WITEL'] }}</td>
                                        <td><a
                                                href="/ttr_comp?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                {{-- @if($data ['TTR_COMP_VALUE'] >= 120)
                                                120.00
                                                @else --}}
                                                {{ number_format($data ['TTR_COMP_VALUE'], 2, '.', ',') }}
                                                {{-- @endif --}}
                                                %
                                            </a>
                                        </td>
                                        <td><a
                                                href="/ttr_comp?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{$data
                                                ['TTR_COMP'] }}</a></td>
                                        <td><a
                                                href="/cnop_mmrr?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['CNOP_AVAIL_VALUE'] >= 120)
                                                120.00
                                                @else
                                                {{ number_format($data ['CNOP_AVAIL_VALUE'], 2, '.', ',') }}
                                                @endif
                                                %
                                            </a></td>
                                        <td><a
                                                href="/cnop_mmrr?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['CNOP_AVAIL'] }}</a></td>
                                        <td><a
                                                href="/cnop_minor?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['MINOR_VALUE'] >= 120)
                                                120.00
                                                @else
                                                {{ number_format($data ['MINOR_VALUE'], 2, '.', ',') }}
                                                @endif
                                                %
                                            </a></td>
                                        <td><a
                                                href="/cnop_minor?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['MINOR'] }}</a></td>
                                        <td><a
                                                href="/cnop_major?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">@if($data
                                                ['MAJOR_VALUE'] >= 120)
                                                120.00
                                                @else
                                                {{ number_format($data ['MAJOR_VALUE'], 2, '.', ',') }}
                                                @endif
                                                %</a></td>
                                        <td><a
                                                href="/cnop_major?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['MAJOR'] }}</a></td>
                                        <td><a
                                                href="/cnop_critical?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['CRITICAL_VALUE'] >= 120)
                                                120.00
                                                @else
                                                {{ number_format($data ['CRITICAL_VALUE'], 2, '.', ',') }}
                                                @endif
                                                % </a></td>
                                        <td><a
                                                href="/cnop_critical?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['CRITICAL'] }} </a></td>
                                        <td><a
                                                href="/ttr_reactive?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['TTR_REACTIVE_VALUE'] >= 120)
                                                120.00
                                                @else
                                                {{ number_format($data ['TTR_REACTIVE_VALUE'], 2, '.', ',') }}
                                                @endif
                                            </a>
                                        </td>
                                        <td><a
                                                href="/ttr_reactive?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['TTR_REACTIVE'] }}</a> </td>
                                        <td>{{ $data ['TOTAL_POIN'] }} </td>
                                        @if ( $data ['RANK'] == 1)<td style="background:#90EE90;"> {{ $data ['RANK'] }}
                                        </td>
                                        @elseif ( $data ['RANK'] == 2) <td style="background:#90EE90;"> {{ $data
                                            ['RANK'] }}</td>
                                        @elseif ( $data ['RANK'] == 3) <td style="background:#90EE90;"> {{ $data
                                            ['RANK'] }}</td>
                                        @else <td>{{ $data ['RANK'] }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0"><b>BEST FULLFILLMENT </b>
                                <b>
                                    <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            if (isset($_GET['tahun'])){
                echo "{$bulan[Request::get('bln')-1]}, {$_GET['tahun']} ";
            }else {
                $month = date('n')-1;
                $year=date('Y');
                echo "$bulan[$month], $year ";
             };
            
            ?>
                                </b>
                            </h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="">
                                <thead class="thead-light">
                                    <tr>
                                        <th rowspan="2">NO</th>
                                        <th rowspan="2">WITEL</th>
                                        <th colspan="2">CNOP Site Delivery Success Rate</th>
                                        <th colspan="2">MTTD OLO</th>
                                        <th colspan="2">Delivery Experience WIB: TTD Compliance</th>
                                        <th rowspan="2">TOTAL POIN</th>
                                        <th rowspan="2">RANK</th>
                                    </tr>
                                    <tr>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                        <th>REALISASI</th>
                                        <th>RANK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--
                                    Route::get('/cnop_sukses',[C_userTest::class,'detail_cnop_sukses']);
                                    Route::get('/wib_olo',[C_userTest::class,'detail_wib_olo']); --}}
                                    @foreach($fullfilment_rekap_rank as $data)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td>{{ $data ['NAMA_WITEL'] }}</td>
                                        <td><a
                                                href="/cnop_sukses?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['CNOP_SUKSES_VALUE'] >= 120)
                                                100.00
                                                @else
                                                {{ number_format($data ['CNOP_SUKSES_VALUE'], 2, '.', ',') }}
                                                @endif
                                                %
                                            </a>
                                        </td>
                                        <td><a
                                                href="/cnop_sukses?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['CNOP_SUKSES'] }}</a></td>
                                        <td><a
                                                href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                {{ number_format($data ['WIB_OLO_VALUE'], 2, '.', ',') }}</a></td>
                                        <td><a
                                                href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['WIB_OLO'] }}</a></td>
                                        <td><a
                                                href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">
                                                @if($data ['TTD_COMP_VALUE'] >= 120)
                                                100.00
                                                @else
                                                {{ number_format($data ['TTD_COMP_VALUE'], 2, '.', ',') }}
                                                @endif
                                                %</a></td>
                                        <td><a
                                                href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                $data ['TTD_COMP'] }}</a></td>
                                        <td>{{ $data ['TOTAL_POIN'] }} </td>

                                        @if ( $data ['RANK'] == 1)<td style="background:#90EE90;"> {{ $data ['RANK'] }}
                                        </td>
                                        @elseif ( $data ['RANK'] == 2) <td style="background:#90EE90;"> {{ $data
                                            ['RANK'] }}</td>
                                        @elseif ( $data ['RANK'] == 3) <td style="background:#90EE90;"> {{ $data
                                            ['RANK'] }}</td>
                                        @else <td>{{ $data ['RANK'] }}</td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <style>
                div.sticky {
                    position: -webkit-sticky;
                    position: sticky;
                    top: 0;
                    background-color: rgba(255, 255, 255, 0);
                    padding: 10px;
                    font-size: 20px;
                }
            </style>
            <div>
                {{-- <div class="sticky" style="z-index:1" align="center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#ASSURANCE"
                        aria-expanded="false" aria-controls="ASSURANCE">
                        <h3 style="color: white">BEST ASSURANCE </h3>
                    </button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#FULLFILMENT" aria-expanded="false" aria-controls="FULLFILMENT">
                        <h3 style="color: white">BEST FULLFILMENT </h3>
                    </button>
                </div> --}}
                <div id="ASSURANCE">
                    <br><br><br><br><br>
                    <h1>BEST ASSURANCE</h1>
                    <div class="row ">
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>TTR Reactive E2E WIBS</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>JUMLAH TIKET</th>
                                                <th>RELASI(TTR)</th>
                                                <th>TARGET(JAM)</th>
                                                <th>ACH</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ttr_reactive as $data)

                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td>

                                                    <a href="/ttr_reactive?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{$data ->
                                                    NAMA_WITEL}}">{{ $data ->
                                                        NAMA_WITEL }}</a>
                                                </td>
                                                <td>{{ $data -> inc }}</td>
                                                <td>{{ $data -> aver }}</td>
                                                <td>{{ $data -> TARGET }}</td>
                                                <td>
                                                    @if($data -> ach >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data -> ach, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> aver_rank }}</td>
                                                <?php 
                                            $tes = $data->inc;
                                            ?>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}

                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>TTR Comp. FO Akses</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>REAL</th>
                                                <th>TARGET(Compliance)</th>
                                                <th>ACH(% real/target)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ttr_comp as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a href="/ttr_comp?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{$data ->
                        NAMA_WITEL}}">{{ $data ->
                                                        NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> REAL_persen }} %</td>
                                                <td>{{ $data -> Target }} %</td>
                                                <td>
                                                    @if($data -> ACH >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data -> ACH, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> ACH_rank }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <hr>
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>CNOP: Availability Access Compliance</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>REAL</th>
                                                <th>TARGET</th>
                                                <th>ACH</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($array_cnop_mmr_rank as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/cnop_mmrr?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data['witel']}}">{{
                                                        $data['witel']}}</a></td>
                                                <td>{{ number_format($data ['real'] , 6, '.', ',')}} %</td>
                                                <td>{{ $data ['target'] }} %</td>
                                                <td>
                                                    @if($data ['ach'] >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data ['ach'] , 2, '.', ',')}}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data ['rank'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}

                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>CNOP 2.0: MTTRi Access Hub: 1 – 24 Site (16 Jam) (MINOR)</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>Jumlah Tiket</th>
                                                <th>Jumlah Comply</th>
                                                <th>TARGET(Compliance)</th>
                                                <th>ACH(% real/target)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($minor as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/cnop_minor?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data -> NAMA_WITEL }}">{{
                                                        $data
                                                        -> NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> inc }} </td>
                                                <td>{{ $data -> sumofini }} </td>
                                                <td>{{ $data -> Target }} %</td>
                                                <td>
                                                    @if($data -> ach >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data -> ach, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> ACH_rank }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <hr>
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>CNOP 2.0 :MTTRi Access Hub: 25 – 74 Site (8 Jam) (MAJOR)</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>Jumlah Tiket</th>
                                                <th>Jumlah Comply</th>
                                                <th>TARGET(Compliance)</th>
                                                <th>ACH(% real/target)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($major as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/cnop_major?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data -> NAMA_WITEL }}">{{
                                                        $data
                                                        -> NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> inc }} </td>
                                                <td>{{ $data -> sumofini }} </td>
                                                <td>{{ $data -> Target }} %</td>
                                                <td>
                                                    @if($data -> ach >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data -> ach, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> ACH_rank }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>CNOP 2.0 :MTTRi Access Hub: ≥ 75 Site (4 Jam) (CRITICAL)</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>Jumlah Tiket</th>
                                                <th>Jumlah Comply</th>
                                                <th>TARGET(Compliance)</th>
                                                <th>ACH(% real/target)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($critical as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/cnop_critical?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data -> NAMA_WITEL }}">{{
                                                        $data
                                                        -> NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> inc }} </td>
                                                <td>{{ $data -> sumofini }} </td>
                                                <td>{{ $data -> Target }} %</td>
                                                <td>
                                                    @if($data -> ach >= 120)
                                                    120.00
                                                    @else
                                                    {{ number_format($data -> ach, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> ACH_rank }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="FULLFILMENT">
                    <br><br><br><br><br>
                    <h1>BEST FULLFILMENT</h1>
                    <div class="row ">

                        {{--2 --}}
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>CNOP Site Delivery Success Rate</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>TOTAL ORDER</th>
                                                <th>COMPLY</th>
                                                <th>NOT COMPLY</th>
                                                <th>REALISASI (TTDC)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cnop_sukses as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/cnop_sukses?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data -> NAMA_WITEL }}">{{
                                                        $data
                                                        -> NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> TOTAL_ORDER }} </td>
                                                <td>{{ $data -> IN_SLA }} </td>
                                                <td>{{ $data -> OUT_SLA }} </td>
                                                <td>
                                                    @if($data -> REALISASI >= 120)
                                                    100.00
                                                    @else
                                                    {{ number_format($data -> REALISASI, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> REALISASI_rank }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="col-6">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>MTTD OLO</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>TOTAL ORDER</th>
                                                <th>COMPLY</th>
                                                <th>NOT COMPLY</th>
                                                <th>REALISASI (MTTD)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($array_wib_olo_awal as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data ['NAMA_WITEL'] }}">{{
                                                        $data
                                                        ['NAMA_WITEL'] }}</a></td>
                                                <td>{{ $data ['TOTAL_ORDER'] }} </td>
                                                <td>{{ $data ['COMP'] }} </td>
                                                <td>{{ $data ['NOT_COMP'] }} </td>
                                                <td>
                                                    {{ number_format($data ['AVG_TTD'] , 2, '.', ',')}}
                                                </td>
                                                <td>{{ $data ['AVG_rank'] }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- --}}
                        <div class="col-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0"> <b>Delivery Experience WIB: TTD Compliance</b>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>NO</th>
                                                <th>WITEL</th>
                                                <th>TOTAL ORDER</th>
                                                <th>COMPLY</th>
                                                <th>NOT COMPLY</th>
                                                <th>REALISASI (TTDC)</th>
                                                <th>RANK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ttd_comp_wib as $data)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td><a
                                                        href="/wib_olo?bln={{$bulan_c}}&tahun={{$tahun}}&kota={{ $data -> NAMA_WITEL }}">{{
                                                        $data ->
                                                        NAMA_WITEL }}</a></td>
                                                <td>{{ $data -> TOTAL_ORDER }} </td>
                                                <td>{{ $data -> COMP }} </td>
                                                <td>{{ $data -> NOT_COMP }} </td>
                                                <td>
                                                    @if($data -> REALISASI >= 120)
                                                    100.00
                                                    @else
                                                    {{ number_format($data -> REALISASI, 2, '.', ',') }}
                                                    @endif
                                                    %
                                                </td>
                                                <td>{{ $data -> REALISASI_rank }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>


            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            $(document).ready( function () {
                $('#datatable-basic').DataTable({
                    // paging: false,  
                    dom: 'Bfrtip', buttons: [
                    'copy', 'csv', 'excel' 
                ]});
            } );
        </script>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/assets/js/core/popper.min.js"></script>
    <script src="assets/assets/js/core/bootstrap.min.js"></script>
    <script src="assets/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/assets/js/plugins/datatables.js"></script>
    <!-- Kanban scripts -->
    <script src="assets/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="assets/assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
      searchable: false,paging: false,  
      fixedHeight: true
    });

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,paging: false,  
      fixedHeight: true
    });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/assets/js/material-dashboard.min.js?v=3.0.3"></script>
</body>

</html>