<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Apr 2020 10:34:44 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Demo Project</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
   <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->																										  
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/calendars/clndr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.min.css')}}">
    
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <!-- END Custom CSS-->
    <style>
    #cimage {
  display: none;
}
</style>
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.html">
                            <h3 class="brand-text">{{session('name')}}(Admin)</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <div class="row">
                        <ul class="nav navbar-nav">

                            <li class="nav-item d-none d-md-block col-md-2"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"> </i></a></li>
                            <li class="col-md-3"></li>
                            <li class="dropdown dropdown-user nav-item col-md-7 float-right"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <span class="avatar avatar-online"><img src="{{asset('images')}}/{{session('pic')}}" alt="avatar"><i></i></span>
                                    <span class="user-name"> {{session('name')}}</span></a>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ url('/users/user_profile') }}"><i class="ft-user"></i> Edit Profile</a>

                                    <a class="dropdown-item" href="{{url('chat/index') }}"><i class="ft-message-square"></i> Chats</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ft-power"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="{{ url('/users/user_list') }}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.users.main">Manage Users</span></a></li>
                <li class=" nav-item"><a href="{{ url('/group/group_list') }}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.group.main">Manage Groups</span></a></li>

                <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.chat-application.main">Chat</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('/chat/index')}}" data-i18n="nav.users.list">Users List</a>
                        </li>
                        <li><a class="menu-item" href="{{url('/chat/group')}}" data-i18n="nav.group.list">Group List</a>
                        </li>
                    </ul>
                </li>

        </div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
           @include('inc.message')
             @yield('content')
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->




    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 </span></p>
    </footer>

    
     
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    
     
    <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/underscore-min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/clndr.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/unslider-min.js')}}"></script>

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/chat-application.js')}}"></script>

    <!-- END PAGE LEVEL JS-->
    
</body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Apr 2020 10:34:51 GMT -->
</html>
