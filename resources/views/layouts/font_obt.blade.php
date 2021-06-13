
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="gtw-scan">
    <meta name="keywords" content="gtw-scan">
    <meta name="author" content="gtw-scan">
    <title> dis-store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{ asset('images/icons/logod.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/logod.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/hospital.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    
</head>
<!-- END: Head-->

<nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-light navbar-shadow border-grey border-lighten-2">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item mobile-menu d-md-none float-left">
                    <i class="nav-link menu-toggle ft-menu font-large-1"></i>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="navbar-brand nav-link"><img src="{{ asset('img/logo/logod.png') }}" alt="branding logo" style="height:40px; width:40px;"> <h3 class="brand-text">Dekbanbanproject</h3></a>
                   
                </li>
              
                       
   
                <li class="nav-item d-md-none ml-auto">
                    <a data-toggle="collapse" data-target="#navbar-mobile1" class="nav-link open-navbar-container">
                        <i class="la la-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div id="navbar-mobile1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('/img/users/head.png') }}" alt="avatar"><i></i></span>
                            <h6 class="user-name"> เข้าสู่ระบบ</h6><i class="caret"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('login')}}" class="dropdown-item"><i class="ft-log-in text-warning mr-2"></i>Login</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('register')}}" class="dropdown-item"><i class="ft-user-plus text-info mr-2"></i> Register</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="ft-phone-call text-danger mr-2"></i> ติดต่อเรา</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- END: Nav-->

@yield('content')



</body>
</html>