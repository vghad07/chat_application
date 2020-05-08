<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/login-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Apr 2020 10:36:33 GMT -->
<head>


    <!-- CSRF Token -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <!-- END Custom CSS-->

</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.html">
                            <!-- <h3 class="brand-text">Robust Admin</h3>-->
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            
        </div>
    </nav>

@yield('content')



    <footer class="footer fixed-bottom footer-dark navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="#" target="_blank">ABC </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
    setTimeout(function(){$('#msg').fadeOut();}, 5000);
    </script>
</body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/login-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Apr 2020 10:36:33 GMT -->
</html>


    </body>
    </html>