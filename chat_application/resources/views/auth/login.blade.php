
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
                                    <div class="card-title text-center" id="msg">
                                       {{ $msg ?? '' }} <!-- <img src="{{ asset('app-assets/images/logo/logo-dark.png')}}" alt="branding logo">-->
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login </span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}" autocomplete="off" novalidate>
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
    <footer class="footer fixed-bottom footer-dark navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="#" target="_blank">ABC </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"> <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
   
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
   
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

