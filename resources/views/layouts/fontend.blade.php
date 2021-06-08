<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loanoi') }}</title>     
    <link href="{{ asset('static/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
    <link href="{{ asset('static/css/sb-admin-2.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('static/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {               
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;                
            background-image: url('WW.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;
            }          
        /* .full-height {
            height: 100vh;
        } */

        /* .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        } */

        /* .position-ref {
            position: relative;
        } */

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
            
        }

        /* .content {
            text-align: center;
            color:#ff6c00;
        } */

        /* .title {
            font-size: 180px;
        } */

        /* .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        } */
        .m-b-md {
            margin-bottom: 30px;
        }
        
    </style>
</head>   
<body id="loading" style="background-image: url('{{ asset('img/logo/room4Hd.jpg')}}');" width="1440px;" height="1000px;">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:#ff6c00;font-size:19px;"><b>Login</b></a> &nbsp;&nbsp;&nbsp;&nbsp;
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:#ff6c00;font-size:19px;"><b>Register</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <main class="py-4">

                    @yield('content')

                </main>
            </div>
        </div>
</body>
</html>
