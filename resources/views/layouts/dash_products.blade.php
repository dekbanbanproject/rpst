
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> --}}
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->


<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Nav-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="{{url('dashbord_home')}}"><img class="brand-logo" alt="" src="{{ asset('img/logo/logod.png') }}">
                            <h3 class="brand-text">Dekbanbanproject</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                       
                      
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-th"></i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="th"><i class="flag-icon flag-icon-th"></i> Thai</a></div>
                        </li>

                    
                        {{-- <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{$data->name}}</span><span class="avatar avatar-online"><img src="data:image/png;base64,{{ chunk_split(base64_encode($data->img))}}" id="edit_preview"  alt="avatar" class="img-thumbnail" style="height:40px; width:40px;"><i></i></span></a> --}}
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{$data->name}}</span><span class="avatar avatar-online"><img src="data:image/png;base64,{{ chunk_split(base64_encode($data->img))}}" id="edit_preview"  alt="avatar" class="img-thumbnail" style="height:40px; width:40px;"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('profile/profile_edit/'.$data->id)}}"><i class="ft-user"></i> Edit Profile</a>
                                {{-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('backend/profile/editprofile')}}"><i class="ft-user"></i> Edit Profile</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Nav-->

       <!-- BEGIN: Main Menu sildebar-->

       <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active"><a href="{{url('dashboard_store')}}"><i class="la la-home text-danger"></i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard Store</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-gear text-danger mr-1"></i><span class="menu-title" data-i18n="Appointment">Settings</span></a>
                    <ul class="menu-content">  
                        {{-- <li><a class="menu-item" href="{{url('setting/infoposition')}}"><i class="la la-user text-danger mr-1"></i><span>ตำแหน่ง</span><span class="badge badge-danger right ml-3">&nbsp;{{$pocount}}&nbsp;</span></a></li> --}}
                        {{-- <li><a class="menu-item" href="{{url('setting/infoperson')}}"><i class="la la-user text-danger mr-1"></i><span>บุคลากร</span><span class="badge badge-danger right ml-3">&nbsp;{{$usercount}}&nbsp;</span></a></li>                       --}}
                        <li><a class="menu-item" href="{{url('setting/storemains')}}"><i class="la la-hospital-o text-danger mr-1"></i><span>คลังหลัก</span><span class="badge badge-danger right ml-3">&nbsp;{{$stmcount}}&nbsp;</span></a></li>  
                        <li><a class="menu-item" href="{{url('setting/storesub')}}"><i class="la la-institution text-danger mr-1"></i><span>คลังย่อย</span><span class="badge badge-danger right ml-3">&nbsp;{{$stscount}}&nbsp;</span></a></li>  
                        <li><a class="menu-item" href="{{url('setting/unit')}}"><i class="la la-flask text-danger mr-1"></i><span>หน่วยนับ</span><span class="badge badge-danger right ml-3">&nbsp;{{$unitcount}}&nbsp;</span></a></li> 
                        <li><a class="menu-item" href="{{url('setting/category')}}"><i class="la la-object-group text-danger mr-1"></i><span>หมวดหมู่</span><span class="badge badge-danger right ml-3">&nbsp;{{$catcount}}&nbsp;</span></a></li> 
                        <li><a class="menu-item" href="{{url('setting/products')}}"><i class="la la-clipboard text-danger mr-1"></i><span >รายการสินค้า</span><span class="badge badge-danger right ml-3">&nbsp;{{$prodcount}}&nbsp;</span></a></li> 
                    </ul>
                </li>
                <li class=" nav-item"><a href="{{url('')}}"><i class="la la-paste text-warning mr-1"></i><span class="menu-title" data-i18n="Appointment">สั่งซื้อ</span><span class="badge badge-warning right">&nbsp;2&nbsp;</span></a></li>
                <li class=" nav-item"><a href="{{url('')}}"><i class="la la-opencart text-info mr-1"></i><span class="menu-title" data-i18n="Appointment">รับสินค้า</span><span class="badge badge-info right">&nbsp;3&nbsp;</span></a></li>
                <li class=" nav-item"><a href="{{url('')}}"><i class="la la-cart-plus text-success mr-1"></i><span class="menu-title" data-i18n="Appointment">เบิกสินค้า</span><span class="badge badge-success right">&nbsp;4&nbsp;</span></a></li>  
                <li class=" nav-item"><a href="{{url('')}}"><i class="la la-signal text-primary mr-1"></i><span class="menu-title" data-i18n="Appointment">รายงานการรับเข้า</span><span class="badge badge-primary right">&nbsp;5&nbsp;</span></a></li> 
                <li class=" nav-item"><a href="{{url('')}}"><i class="la la-la la-bar-chart text-warning mr-1"></i><span class="menu-title" data-i18n="Appointment">รายงานการเบิก</span><span class="badge badge-warning right">&nbsp;6&nbsp;</span></a></li>         
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->


@yield('content')






<div class="sidenav-overlay"></div>
    <div class="drag-target"></div> 



<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://gotowinsolution.co.th" target="_blank">Scan-gtw</a></span><span class="float-md-right d-none d-lg-block">Gotowin Solution & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
</footer>
<!-- END: Footer-->


@yield('footer')


</body>
</html>