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

@include('..//layouts/clinic_menu_font')

    {{-- <main class="py-4"> --}}

        @yield('content')

    {{-- </main> --}}


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
