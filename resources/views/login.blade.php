<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Design_Gurus" name="author">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Farm Chain Management System</title>

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
{{--<div id="ip-container" class="ip-container">--}}
    {{--<header class="ip-header">--}}
        {{--<div class="ip-loader">--}}
            {{--<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">--}}
                {{--<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>--}}
                {{--<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>--}}
            {{--</svg>--}}
        {{--</div>--}}
    {{--</header>--}}
{{--</div>--}}
<!---Preloader Ends Here--->

    <div class="height-100-vh bg-primary-trans">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="login-div">
                        <p class="logo mb-1">Farm Chain Management System</p>
                        <form id="needs-validation" action="/login" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control input-lg" placeholder="nama" name="nama" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input class="form-control input-lg" placeholder="nomor telepon" name="no" type="text" required>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary mt-2">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

<!--Sparkline Chart Js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="assetAdmin/assets/plugins/sparkline/jquery.charts-sparkline.js"></script>

<!--Custom Scroll-->
<script type="text/javascript" src="assetAdmin/assets/plugins/customScroll/jquery.mCustomScrollbar.min.js"></script>
<!--Sortable Js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/sortable2/sortable.min.js"></script>
<!--DropZone Js-->
<script type="text/javascript" src="assetAdmin/assets/plugins/dropzone/dropzone.js"></script>
<!--Date Range JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/date-range/moment.min.js"></script>
<script type="text/javascript" src="assetAdmin/assets/plugins/date-range/daterangepicker.js"></script>
<!--CK Editor JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/ckEditor/ckeditor.js"></script>
<!--Data-Table JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/data-tables/datatables.min.js"></script>
<!--Editable JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/editable/editable.js"></script>
<!--Full Calendar JS-->
<script type="text/javascript" src="assetAdmin/assets/plugins/full-calendar/fullcalendar.min.js"></script>

<!--- Main JS -->
<script src="assetAdmin/assets/js/main.js"></script>

</html>