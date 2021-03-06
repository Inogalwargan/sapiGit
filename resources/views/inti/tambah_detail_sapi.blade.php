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
    <link rel="stylesheet" type="text/css" href="../assetAdmin/gradient.css">
</head>
<body>

    <!---Preloader Starts Here--->
    <!-- <div id="ip-container" class="ip-container"> -->
      <!--   <header class="ip-header">
            <h1 class="ip-logo text-center"><img class="img-fluid" src="assets/images/logo-c.png" alt="" class="ip-logo text-center"/></h1>
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                </svg>
            </div>
        </header>
    </div> -->
    <!---Preloader Ends Here--->


    <!--Navigation-->
    <nav id="navigation" class="navigation-sidebar bg-primary">
        <div class="navigation-header">
            <a href="index.html"><span class="logo">SAPI BALURAN</span></a>
            <!--<img src="logo.png" alt="logo" class="brand" height="50">-->
        </div>

        <!--Navigation Profile area-->
        <div class="navigation-profile">
            <img class="profile-img rounded-circle" src="../assetAdmin/assets/images/1.jpg" alt="profile image">
            <h4 class="name">Admin Inti</h4>
            <span class="designation">SAPI</span>

            <a id="show-user-menu" href="javascript:void(0);" class="circle-white-btn profile-setting"><i class="fa fa-cog"></i></a>

            <!--logged user hover menu-->
            <div class="logged-user-menu bg-white">
                <div class="avatar-info">
                    <img class="profile-img rounded-circle" src="assetAdmin/assets/images/1.jpg" alt="profile image">
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
        @include('inti.include_inti')
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
                            <span class="logo">SAPI BALURAN</span>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Pengajuan</a></li>
                                <li class="breadcrumb-item active">Lihat Pengajuan</li>
                                <li class="breadcrumb-item active">Form Tambah Detail Sapi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="content sm-gutter">
                <div class="container-fluid padding-25 sm-padding-10 ">
                    <div class="row ">
                        <div class="col-12 ">
                            <div class="section-title">
                                <h4>SAPI BALURAN</h4>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="block form-block mb-4" id="grad3">
                                <div class="block-heading">
                                    <h5 style="color: white">SAPI Ke-{{$no_sapi}}</h5>
                                    <h5 style="color: white">Tambah Data Sapi</h5>
                                </div>

                                <form method="POST" action="../proses_tambah_detail_sapi" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    @foreach($pengajuan as $pengajuan)
                                     <div class="form-group">
                                        <label style="color: white;">Nama Peternak</label>
                                        <div class="" >
                                            <input class="form-control  bg-white" name="nama_peternak" type="text" value="{{$pengajuan->nama_peternak}}" disabled="true">
                                        </div>
                                    </div>

                                    <div class="form-group" hidden="">
                                        <label style="color: white;"></label>
                                        <div class="" >
                                            <input class="form-control  bg-white" name="no_kk" type="hidden" value="{{$pengajuan->no_kk}}" disabled="true">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="color: white;">Jumlah Sapi</label>
                                        <div class="">
                                            <input class="form-control  bg-white" type="text" value="{{$pengajuan->jumlah_sapi}}" disabled="true">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label style="color: white;">Berat Awal Sapi</label>
                                        <div class="input-group">
                                            <input class="form-control  bg-white" name="berat_awal"  type="number" placeholder="30 kg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: white;">Jenis Sapi</label>
                                        <select id="jenissapi" class="form-control bg-white" name="jenis_sapi">
                                            <option value="Sapi PO">Sapi PO</option>
                                            <option value="Lokal">Lokal</option>
                                            <option value="Bali">Bali</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                    <div id="sembunyi" style="display:none">
                                        <div class="form-group">
                                            <input class="form-control bg-white" type="text" placeholder="Masukkan jenis sapi baru">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: white;">Jenis Kelamin Sapi</label>
                                        <label class="custom-control custom-radio primary">
                                            <input name="jenis_kelamin" value="j" class="custom-control-input" type="radio">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Jantan</span>
                                        </label>
                                         <label class="custom-control custom-radio primary">
                                            <input name="jenis_kelamin" value="b" class="custom-control-input" type="radio">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Betina</span>
                                        </label>
                                    </div>
                                    
                                    <hr>
                                    <button class="btn btn-primary" type="submit" name="id_pengajuan" value="{{$pengajuan->id_pengajuan}}">Simpan</button>
                                    <a href="cek_data_pengajuan" class="btn btn-dark">Selesai</a>
                                    @endforeach
                                </form>
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

    <script>
        $('#jenissapi').change(function(){
            if($(this).val() == 'lain-lain'){
                $('#sembunyi').fadeIn('1000');
            }else{
                $('#sembunyi').fadeOut('1000');
            }
        })
    </script>

    <!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:44:19 GMT -->
    </html>