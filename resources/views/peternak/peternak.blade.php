<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Design_Gurus" name="author">
    <meta content="WOW Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Peternak</title>

    <!--favicon-->
    <link href="assetAdmin/assets/images/favicon.ico" rel="shortcut icon">

    <!--Preloader-CSS-->
    <link rel="stylesheet" href="assetAdmin/assets/plugins/preloader/preloader.css">

    <!--bootstrap-4-->
    <link rel="stylesheet" href="assetAdmin/assets/css/bootstrap.min.css">

    <!--Custom Scroll-->
    <link rel="stylesheet" href="assetAdmin/assets/plugins/customScroll/jquery.mCustomScrollbar.min.css">
    <!--Font Icons-->
    <link rel="stylesheet" href="assetAdmin/assets/icons/simple-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/dripicons/dripicons.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/eightyshades/eightyshades.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/foundation/foundation-icons.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/metrize/metrize.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/typicons/typicons.min.css">
    <link rel="stylesheet" href="assetAdmin/assets/icons/weathericons/css/weather-icons.min.css">

    <!--Date-range-->
    <link rel="stylesheet" href="assetAdmin/assets/plugins/date-range/daterangepicker.css">
    <!--Drop-Zone-->
    <link rel="stylesheet" href="assetAdmin/assets/plugins/dropzone/dropzone.css">
    <!--Full Calendar-->
    <link rel="stylesheet" href="assetAdmin/assets/plugins/full-calendar/fullcalendar.min.css">
    <!--Normalize Css-->
    <link rel="stylesheet" href="assetAdmin/assets/css/normalize.css">
    <!--Main Css-->
    <link rel="stylesheet" href="assetAdmin/assets/css/main.css">
</head>
<body>

<!---Preloader Starts Here--->
<div id="ip-container" class="ip-container">
    <header class="ip-header">
        <h1 class="ip-logo text-center"><img class="img-fluid" alt="" class="ip-logo text-center"/></h1>
        <div class="ip-loader">
            <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
            </svg>
        </div>
    </header>
</div>
<!---Preloader Ends Here--->

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block bg-warning mb-4">
                            <div class="value text-center" style="color:antiquewhite;display:inherit"><?=$pengambilanpakan?> Kg</div>
                            <p class="label text-center" style="color:#333333">Pakan yang telah diambil</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block bg-secondary mb-4">
                            <div class="value text-center" style="color:black;display:inherit">Berat Sapi</div>
                            <?php if(intval($beratsekarang)<intval($beratawal)){$beratsekarang=$beratawal;}?>
                            <p class="label text-center" style="color:darkred">Awal : <?=$beratawal?> Kg <br>Saat ini : <?=$beratsekarang?> Kg</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block bg-dark mb-4">						
                            <div class="value text-center" style="color:ghostwhite;display:inherit"><?php echo intval($jsapibetina)+intval($jsapijantan)?> Ekor</div>
                            <p class="label text-center"><a class="btn btn-xs btn-outline-white" id="sapijantan"><?=$jsapijantan?> Jantan </a> <a class="btn btn-xs btn-outline-white" id="sapibetina"><?=$jsapibetina?> Betina</a></p>
                        </div>
                    </div>

                    <div class="block form-block mb-4" style="display:none" id="jantan">
                        <div class="block-heading text-center">
                            <h5>Pertumbuhan Sapi Jantan</h5>
                        </div>
                        <div class="tabel table-responsive">
                            <table id="example2"
                                   class="table table-bordered table-striped dataTable example2"
                                   role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        No.
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Jenis Sapi
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Jenis Kelamin
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Pertumbuhan (Kg)
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no =0)
                                @foreach($pertumbuhanjantan as $item)
                                    @php($no++)
                                    @if(is_null($item->berat_saat_ini))
                                        @php($item->berat_saat_ini=0)
                                    @endif
                                    <tr>
                                        <td style="vertical-align: middle!important;">{{$no}}</td>
                                        <td style="vertical-align: middle!important;">{{$item->jenis_sapi}}</td>
                                        <td style="vertical-align: middle!important;">
                                            <?php if ($item->jenis_kelamin=="j") {
                                                $jk="Jantan";
                                            }else{
                                                $jk="Betina";
                                            }?>
                                            {{$jk}}
                                        </td>
                                        <td style="text-align: center!important; vertical-align: middle!important;">{{abs(intval($item->berat_awal))-intval($item->berat_saat_ini)}}</td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="block form-block mb-4" style="display:none" id="betina">
                        <div class="block-heading text-center">
                            <h5>Pertumbuhan Sapi Betina</h5>
                        </div>
                        <div class="tabel table-responsive">
                            <table id="example1"
                                   class="table table-bordered table-striped dataTable example2"
                                   role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        No.
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Jenis Sapi
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Jenis Kelamin
                                    </th>
                                    <th style="text-align: center!important; vertical-align: middle!important;">
                                        Pertumbuhan (Kg)
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no =0)
                                @foreach($pertumbuhanbetina as $item)
                                    @php($no++)
                                    @if(is_null($item->berat_saat_ini))
                                        @php($item->berat_saat_ini=0)
                                    @endif
                                    <tr>
                                        <td style="vertical-align: middle!important;">{{$no}}</td>
                                        <td style="vertical-align: middle!important;">{{$item->jenis_sapi}}</td>
                                        <td style="vertical-align: middle!important;">
                                            <?php if ($item->jenis_kelamin=="j") {
                                                $jk="Jantan";
                                            }else{
                                                $jk="Betina";
                                            }?>
                                            {{$jk}}
                                        </td>
                                        <td style="text-align: center!important; vertical-align: middle!important;">{{abs(intval($item->berat_awal))-intval($item->berat_saat_ini)}}</td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block bg-dark mb-4">
                            <div class="value text-center" style="display:inherit">
                                <a href="/logout" style="color:white;">
                                    <span class="icon-thumbnail"><i class="icon-power"></i></span>
                                    <span class="title">Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<!--Jquery-->
<script type="text/javascript" src="assetAdmin/assets/js/jquery-3.2.1.min.js"></script>
<!--Bootstrap Js-->
<script type="text/javascript" src="assetAdmin/assets/js/popper.min.js"></script>
<script type="text/javascript" src="assetAdmin/assets/js/bootstrap.min.js"></script>
<!--Modernizr Js-->
<script type="text/javascript" src="assetAdmin/assets/js/modernizr.custom.js"></script>

<!--Morphin Search JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/morphin-search/classie.js"></script>
<script type="text/javascript" src="assetAdmin/assets/plugins/morphin-search/morphin-search.js"></script>
<!--Morphin Search JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/preloader/pathLoader.js"></script>
<script type="text/javascript" src="assetAdmin/assets/plugins/preloader/preloader-main.js"></script>

<!--Chart js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/charts/Chart.min.js"></script>
<!--Data-Table JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/data-tables/datatables.min.js"></script>
<!--Sparkline Chart Js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="assetAdmin/assets/plugins/sparkline/jquery.charts-sparkline.js"></script>

<!--Custom Scroll-->
<script type="text/javascript" src="assetAdmin/assets/plugins/customScroll/jquery.mCustomScrollbar.min.js"></script>
<!--Sortable Js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/sortable2/sortable.min.js"></script>

<!--- Main JS -->
<script src="assetAdmin/assets/js/main.js"></script>
    <script>

        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'pageLength': 10,
            "dom": '<"pull-left"f>t<"pull-right"p>',
            "oLanguage": {
                "sSearch": "Cari : "
            }
        });

        $('#example1').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'pageLength': 10,
            "dom": '<"pull-left"f>t<"pull-right"p>',
            "oLanguage": {
                "sSearch": "Cari : "
            }
        });

        $('#sapijantan').click(function () {
            if($('#jantan').css('display') == 'none'){
                $('#jantan').fadeIn();
            }else{
                $('#jantan').fadeOut();
            }
        });

        $('#sapibetina').click(function () {
            if($('#betina').css('display') == 'none'){
                $('#betina').fadeIn();
            }else{
                $('#betina').fadeOut();
            }
        });

    </script>
</html>