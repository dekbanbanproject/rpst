<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loanoi') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
	{{-- <link rel="icon" href="img/Fevicon.png" type="image/png"> --}}
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/vendors_food/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors_food/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors_food/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors_food/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors_food/Magnific-Popup/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css_food/style.css') }}">

</head>
<body>

<!--================ Header Menu Area start =================-->
<header class="header_area">
  <br>
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          {{-- <div class="container box_1620"> --}}
        <a class="navbar-brand logo_h" href="">
         
          <img src="{{ asset('/img/logo/rpst.jpg') }}" alt="" style="height:90px; width:90px;" style="opacity: .8">
        </a>
        {{-- @foreach($data_hos  as $item )
        <label for=""  style='font-size:30px;color:rgb(253, 77, 7)'><cite title="Source Title">{{$item->hospitalname}}</cite></label>
        @endforeach --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav justify-content-end">
            <li class="nav-item active"><a class="nav-link" href="{{ url('/')}}">Home</a></li>

            <li class="nav-item submenu dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">?????????????????????????????????</a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register')}}">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('QrLogin')}}">QrLogin</a></li>
              </ul>
            </li>

            <li class="nav-item"><a class="nav-link" href="{{ url('mcontact')}}">???????????????????????????</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<!--================Header Menu Area =================-->


    <main class="py-4">

        @yield('content')

    </main>


  @include('..//layouts/clinic_footer')

  <script src="{{ asset('/vendors_food/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('/vendors_food/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendors_food/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/vendors_food/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('/vendors_food/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js_food/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('js_food/mail-script.js') }}"></script>
  <script src="{{ asset('js_food/main.js') }}"></script>

</body>
</html>
