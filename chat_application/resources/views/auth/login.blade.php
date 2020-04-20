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
    <meta name="author" content="PIXINVENT">
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
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
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
            <!--<div class="navbar-container">
                <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="index.html"><i class="ficon ft-arrow-left"></i></a></li>
                        <li class="dropdown nav-item"><a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a></li>
                    </ul>
                </div>
            </div>
            -->
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <!-- <img src="{{ asset('app-assets/images/logo/logo-dark.png')}}" alt="branding logo">-->
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login </span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input name="email" type="email" @error('email') is-invalid @enderror class="form-control input-lg" id="email" placeholder="Your Email" value="{{ old('email') }}" tabindex="1" required data-validation-required-message="Please enter your username.">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">

                                                <input type="password" class="form-control input-lg" id="password" placeholder="Enter Password" tabindex="2" @error('password') is-invalid @enderror name="password" required autocomplete="current-password" data-validation-required-message="Please enter valid passwords.">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class=" form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : ''}} class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 text-center text-md-right">
                                                    @if (Route::has('password.request'))
                                                    <a class="card-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif

                                                </div>
                                                <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> {{ __('Login') }}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New Member?</span></p>
                                    <a href="{{ route('register') }}" class="btn btn-info btn-block btn-lg mt-3"><i class="ft-user"></i> Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!--
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a>
        <div class="customizer-content p-2">
            <h4 class="text-uppercase mb-0">Theme Customizer</h4>
            <hr>
            <p>Customize & Preview in Real Time</p>
            <h5 class="mt-1 mb-1 text-bold-500">Menu Color Options</h5>
            <div class="form-group">
                <!-- Outline Button group 
    <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-info" data-sidebar="menu-light">Light Menu</button>
        <button type="button" class="btn btn-outline-info" data-sidebar="menu-dark">Dark Menu</button>
    </div>
    </div>
    <hr>
    <h5 class="mt-1 text-bold-500">Layout Options</h5>
    <ul class="nav nav-tabs nav-underline nav-justified layout-options">
        <li class="nav-item">
            <a class="nav-link layouts active" id="tabIcon-tab21" data-toggle="tab" aria-controls="base-tabIcon21" href="#tabIcon21" aria-expanded="true">Layouts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navigation" id="tabIcon-tab22" data-toggle="tab" aria-controls="base-tabIcon22" href="#tabIcon22" aria-expanded="false">Navigation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar" id="tabIcon-tab23" data-toggle="tab" aria-controls="base-tabIcon23" href="#tabIcon23" aria-expanded="false">Navbar</a>
        </li>
    </ul>
    <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="base-tabIcon21" aria-expanded="true" aria-labelledby="tabIcon-tab21">

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="collapsed-sidebar" id="collapsed-sidebar">
                <label class="custom-control-label" for="collapsed-sidebar">Collapsed Menu</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="fixed-layout" id="fixed-layout">
                <label class="custom-control-label" for="fixed-layout">Fixed Layout</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="static-layout" id="static-layout">
                <label class="custom-control-label" for="static-layout">Static Layout</label>
            </div>

        </div>
        <div class="tab-pane" id="base-tabIcon22" aria-labelledby="tabIcon-tab22">

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="native-scroll" id="native-scroll">
                <label class="custom-control-label" for="native-scroll">Native Scroll</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="right-side-icons" id="right-side-icons">
                <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="bordered-navigation" id="bordered-navigation">
                <label class="custom-control-label" for="bordered-navigation">Bordered Navigation</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="flipped-navigation" id="flipped-navigation">
                <label class="custom-control-label" for="flipped-navigation">Flipped Navigation</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="collapsible-navigation" id="collapsible-navigation">
                <label class="custom-control-label" for="collapsible-navigation">Collapsible Navigation</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="static-navigation" id="static-navigation">
                <label class="custom-control-label" for="static-navigation">Static Navigation</label>
            </div>

        </div>
        <div class="tab-pane" id="base-tabIcon23" aria-labelledby="tabIcon-tab23">

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="brand-center" id="brand-center">
                <label class="custom-control-label" for="brand-center">Brand Center</label>
            </div>

            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" name="navbar-static-top" id="navbar-static-top">
                <label class="custom-control-label" for="navbar-static-top">Static Top</label>
            </div>

        </div>
    </div>
    <hr>
    <h5 class="mt-1 text-bold-500">Navigation Color Options</h5>
    <ul class="nav nav-tabs nav-underline nav-justified color-options">
        <li class="nav-item">
            <a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1" href="#clrOpt1" aria-expanded="false">Semi Light</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="#clrOpt2" aria-expanded="false">Semi Dark</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3" aria-expanded="false">Dark</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="#clrOpt4" aria-expanded="true">Light</a>
        </li>
    </ul>
    <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true" aria-labelledby="color-opt-1">
            <div class="row">
                <div class="col-6">
                    <h6>Solid</h6>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="default-solid">
                        <label class="custom-control-label" for="default-solid">Default</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="primary-solid">
                        <label class="custom-control-label" for="primary-solid">Primary</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="danger-solid">
                        <label class="custom-control-label" for="danger-solid">Danger</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-success" id="success-solid">
                        <label class="custom-control-label" for="success-solid">Success</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="blue">
                        <label class="custom-control-label" for="blue">Blue</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="cyan">
                        <label class="custom-control-label" for="cyan">Cyan</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="pink">
                        <label class="custom-control-label" for="pink">Pink</label>
                    </div>

                </div>
                <div class="col-6">
                    <h6>Gradient</h6>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" checked class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue">
                        <label class="custom-control-label" for="bg-gradient-x-grey-blue">Default</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary">
                        <label class="custom-control-label" for="bg-gradient-x-primary">Primary</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger">
                        <label class="custom-control-label" for="bg-gradient-x-danger">Danger</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success">
                        <label class="custom-control-label" for="bg-gradient-x-success">Success</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue">
                        <label class="custom-control-label" for="bg-gradient-x-blue">Blue</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan">
                        <label class="custom-control-label" for="bg-gradient-x-cyan">Cyan</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink">
                        <label class="custom-control-label" for="bg-gradient-x-pink">Pink</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" checked class="custom-control-input bg-default" data-bg="bg-default" id="opt-default">
                <label class="custom-control-label" for="opt-default">Default</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="opt-primary">
                <label class="custom-control-label" for="opt-primary">Primary</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="opt-danger">
                <label class="custom-control-label" for="opt-danger">Danger</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="opt-success">
                <label class="custom-control-label" for="opt-success">Success</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="opt-blue">
                <label class="custom-control-label" for="opt-blue">Blue</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="opt-cyan">
                <label class="custom-control-label" for="opt-cyan">Cyan</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="opt-pink">
                <label class="custom-control-label" for="opt-pink">Pink</label>
            </div>

        </div>
        <div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
            <div class="row">
                <div class="col-6">
                    <h3>Solid</h3>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="solid-blue-grey">
                        <label class="custom-control-label" for="solid-blue-grey">Default</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="solid-primary">
                        <label class="custom-control-label" for="solid-primary">Primary</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="solid-danger">
                        <label class="custom-control-label" for="solid-danger">Danger</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="solid-success">
                        <label class="custom-control-label" for="solid-success">Success</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="solid-blue">
                        <label class="custom-control-label" for="solid-blue">Blue</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="solid-cyan">
                        <label class="custom-control-label" for="solid-cyan">Cyan</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="solid-pink">
                        <label class="custom-control-label" for="solid-pink">Pink</label>
                    </div>

                </div>

                <div class="col-6">
                    <h3>Gradient</h3>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue1">
                        <label class="custom-control-label" for="bg-gradient-x-grey-blue1">Default</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary1">
                        <label class="custom-control-label" for="bg-gradient-x-primary1">Primary</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger1">
                        <label class="custom-control-label" for="bg-gradient-x-danger1">Danger</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success1">
                        <label class="custom-control-label" for="bg-gradient-x-success1">Success</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue1">
                        <label class="custom-control-label" for="bg-gradient-x-blue1">Blue</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan1">
                        <label class="custom-control-label" for="bg-gradient-x-cyan1">Cyan</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink1">
                        <label class="custom-control-label" for="bg-gradient-x-pink1">Pink</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey bg-lighten-4" id="light-blue-grey">
                <label class="custom-control-label" for="light-blue-grey">Default</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-primary" data-bg="bg-primary bg-lighten-4" id="light-primary">
                <label class="custom-control-label" for="light-primary">Primary</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-danger" data-bg="bg-danger bg-lighten-4" id="light-danger">
                <label class="custom-control-label" for="light-danger">Danger</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-success" data-bg="bg-success bg-lighten-4" id="light-success">
                <label class="custom-control-label" for="light-success">Success</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue" data-bg="bg-blue bg-lighten-4" id="light-blue">
                <label class="custom-control-label" for="light-blue">Blue</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan bg-lighten-4" id="light-cyan">
                <label class="custom-control-label" for="light-cyan">Cyan</label>
            </div>

            <div class="custom-control custom-radio mb-1">
                <input type="radio" name="nav-light-clr" class="custom-control-input bg-pink" data-bg="bg-pink bg-lighten-4" id="light-pink">
                <label class="custom-control-label" for="light-pink">Pink</label>
            </div>

        </div>
    </div>
    </div>
    </div>-->


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
</body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/login-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Apr 2020 10:36:33 GMT -->
</html>