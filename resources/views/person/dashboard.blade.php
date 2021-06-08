<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loanoi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

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
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .top-center {
                position: absolute;
                text-align: center;
                top: 145px;                
            }
            .top-left {
                position: absolute;
                left: 205px;
                top: 5px;                
            }
            .top-leftname {
                position: absolute;
                left: 375px;
                top: 26px;                
            }
            .top-right {
                position: absolute;
                right: 195px;
                top: 55px;                
            }
            .top-color {
                position: absolute;
                right: 0px;
                top:0px;                
            }
            .content {
                text-align: center;
                color:#ff6c00;
            }

            .title {
                font-size: 180px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .h-12 {
              margin-top: 12%;
            }
          
        </style>
    </head>
    
    <body id="loading" style="background-image: url('{{ asset('img/logo/room4.jpg')}}');" width="1440px;" height="1000px;">
       
          <div class="flex-center position-ref full-height">
            <div class="top-left links">
              <img src="{{ asset('/img/logo/Kwan3.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" width="160" height="100">
            </div>
            <div class="top-leftname links">
              <img src="{{ asset('/img/logo/Kwan.png')}}"  width="300" height="100">
            </div>
            <div class="top-color links">
              <img src="{{ asset('/img/logo/Kwan4.gif')}}"  width="450" height="150">
            </div>
              @if (Route::has('login'))
                  <div class="top-right links">
                      @auth
                          <a href="{{ url('/home') }}">Home</a>
                      @else
                          <a href="{{ route('login') }}" style="color:#ffff;font-size:25px;" data-toggle="modal" data-target="#sideModalTR"><b>Login</b></a>                          
                          @if (Route::has('register'))
                              <!-- <a href="{{ route('register') }}" style="color:#ff6c00;font-size:19px;">Register</a> -->
                          @endif
                      @endauth
                     
                  </div>
              @endif
          
          
          
        <!-- <button type="button" class="btn btn-light">Light</button> -->
<div class="container top-center">       
    <div class="row"> 
        @foreach ($norooms as $noroom)                       
        <div class="col-md-2 mb-2">
            <div class="card border-left-primary Large shadow h-55 py-2">
                <button class="btn btn-light" type="button" data-toggle="modal" data-target=".bd-example-modal-lg{{ $noroom->ROOM_ID }}">
                <center> 
                        <label for="" style="color:#ff6c00;font-size:40px;"><b>{{ $noroom->ROOM_NAME }} </b></label> <br>  
                    @if($noroom->PERSON_ROOM_ID == $noroom->ROOM_ID)
                       
                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($noroom->PERSON_IMG)) }}"  class="card-img-top" style="height:50px; width:50px;">
                            &nbsp;&nbsp;
                        <img src="{{ asset('img/logo/off.png')}}" class="card-img-top" style="height:50px; width:50px;">
                    @else
                        <!-- <img src="{{ asset('img/logo/reg.png')}}" class="card-img-top" style="height:50px; width:80px;">
                            &nbsp;&nbsp; -->
                        <img src="{{ asset('img/logo/em.png')}}" class="card-img-top" style="height:50px; width:50px;">
                    @endif
                </center>
                </button>
            </div>
        </div>
       

<div class="modal fade bd-example-modal-lg{{ $noroom->ROOM_ID }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100" id="myModalLabel" style="color:#ff6c00;font-size:40px;">จองห้องพัก</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <center> 
                        <label for="" style="color:#ff6c00;font-size:40px;"><b>{{ $noroom->ROOM_NAME }} </b></label> <br>  
                            @if($noroom->PERSON_ROOM_ID == $noroom->ROOM_ID)
                                <img src="{{ asset('img/person/' .$noroom->PERSON_IMG)}}" class="card-img-top" style="height:50px; width:50px;">
                                    &nbsp;&nbsp;
                                <img src="{{ asset('img/logo/off.png')}}" class="card-img-top" style="height:50px; width:50px;">
                            @else
                                <img src="{{ asset('img/logo/peple.png')}}" class="card-img-top" style="height:50px; width:50px;">
                                    &nbsp;&nbsp;
                                <img src="{{ asset('img/logo/em.png')}}" class="card-img-top" style="height:50px; width:50px;">
                            @endif
                            <br>  <br> 
                
                            @if($noroom->PERSON_STATUS == 'True')

                            <label for="" style="color:#ff6c00;font-size:40px;"><b>จองแล้ว </b></label>
                            @else
                            <form action="{{ route('Per.savefontend') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" value="{{ $noroom->ROOM_ID }}" name ="PERSON_ROOM_ID" id="PERSON_ROOM_ID" class="form-control input-sm">
                            
                                    <div class="row push">                                                                              
                                        <div class="col-md-2 text-right">ชื่อ:</div>
                                            <div class="col-md-4">                            
                                                <input name ="PERSON_FNAME" id="PERSON_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                            </div> 
                                            <div class="col-md-2 text-right">
                                                นามสกุล: 
                                            </div>  
                                            <div class="col-md-4">
                                                <input name ="PERSON_LNAME" id="PERSON_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                            </div>  
                                        </div>               
                                        <br> 
                                        <div class="row push">                
                                            <div class="col-md-2 text-right">Cid:</div>
                                                <div class="col-md-4">                            
                                                    <input name ="PERSON_CID" id="PERSON_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                </div> 
                                                <div class="col-md-2 text-right">โทร:</div>
                                                <div class="col-md-4">                            
                                                    <input name ="PERSON_TEL" id="PERSON_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                </div> 
                                            </div>
                                            <br> 
                                        <div class="row push">                
                                            <div class="col-md-2 text-right">เข้า:</div>
                                                <div class="col-md-4">                            
                                                    <input type="date" name ="PERSON_DATE_IN" id="PERSON_DATE_IN" class="form-control datepicker" data-date-format="mm/dd/yyyy" >  
                                                                             
                                                </div> 
                                                <div class="col-md-2 text-right">ออก:</div>
                                                <div class="col-md-4">                            
                                                    <input type="date" name ="PERSON_DATE_OUT" id="PERSON_DATE_OUT" class="form-control datepicker" data-date-format="mm/dd/yyyy" >                           
                                                </div> 
                                            </div>
                                        @endif
                    </center>
                </div>
      <div class="modal-footer justify-content-center">      
        @if($noroom->PERSON_STATUS == 'True')
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        @else
        <button type="submit" class="btn btn-primary">จองเลย !!!</button>        
        @endif

      </div>
    </div>
  </div>
</div>
</form>  
@endforeach 
<!-- Full Height Modal Right -->

<div class="container">
    <div class="row">
    <div class="col-md-4">
    </div>
     <div class="col-md-4">
        <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue">
                    <li class="page-item ">
                        <a class="page-link" tabindex="-1">Previous</a>
                    </li>           
                    {{ $norooms->links() }}
                    <li class="page-item ">
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>  
        </div>
        <div class="col-md-4">
    </div>
    </div>
</div>
</div>
<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/room4Hd.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div> 
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/room3.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
          
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/room2.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
          
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/BG.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
          
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/BG3.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
            
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="{{ asset('img/room/room5Hd.jpg')}}" class="img-fluid img-thumbnail shadow" alt="" style="height:110px; width:160px;">
            
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>  
    </div>
  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://dekbanbanproject.com/"> projectbannok.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<!-- Side Modal Login -->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel" style="color:#ff6c00;font-size:19px;">Backend&nbsp;Login</h4>
        <!-- <h5 class="mr-auto modal-title w-100" id="myModalLabel2">เข้าสู่ระบบ</h5> -->
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#ff6c00;font-size:19px;">
        <!--  <span aria-hidden="true">&times;</span>-->
        </button> 
      </div>
      <div class="modal-body">
       
      <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" >{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                      <div class="modal-footer">
                            <div class="col-md-8 offset-md-4">                              

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-info">
                                   เข้าสู่ระบบ <!-- {{ __('Login') }} -->
                                </button>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- Side Modal Top Right -->







    </body>
   
<script>
        $('li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        });

</script>


</html>
