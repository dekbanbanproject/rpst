<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Medical') }}</title>  
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css_dashboard/bar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_dashboard/pignose.calender.css') }}" />
    <link href="{{ asset('css_dashboard/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css_dashboard/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css_dashboard/style4.css') }}">
    <link href="{{ asset('css_dashboard/fontawesome-all.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>

@include('..//layouts/clinic_menu_dashboard')


    <main class="py-4">           

        @yield('content')

    </main>

@include('..//layouts/clinic_footer') 

  <!--================Blog section end =================-->  


  <script src="{{ asset('vendors_food/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors_food/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors_food/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors_food/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors_food/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js_food/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('js_food/mail-script.js') }}"></script>
  <script src="{{ asset('js_food/main.js') }}"></script>
</body>
</html>