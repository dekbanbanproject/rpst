
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

  <link rel="stylesheet" href="{{ asset('vendors_food/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors_food/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors_food/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors_food/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors_food/Magnific-Popup/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('css_food/style.css') }}">
  
  <style type="text/css">
    .notifyjs-corner{
        z-index:10000 !important;
    }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">

</head>

<body>

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href=""><img src="/img/logo/logoss.gif" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="{{ url('/home')}}">หน้าหลัก</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">รายงาน</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ url('report/report_symindex')}}">รายงานการรักษา</a></li>
                                   
                </ul>
			        </li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">ทะเบียนคนไข้</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('Clinic.index')}}">ลงทะเบียนคนไข้</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('sym/sym_index')}}">รายการรักษา</a></li>                  
                </ul>
			        </li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">ตั้งค่า</a>
                <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="{{ url('supplier/index')}}">supplier</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('setting/locate')}}">สถานพยาบาล</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('setting/drug')}}">รายการยา</a></li>   
                  <li class="nav-item"><a class="nav-link" href="{{ url('setting/recieve_drug')}}">รับยาเข้าระบบ</a></li>                
                </ul>
			        </li>

            
              <li class="nav-item active submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="">Profile</a></li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
                 
                </ul>
			        </li>
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


   



<blockquote class="blockquote text-center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="navbar-brand logo_h" href=""><img src="/img/logo/logos.gif" alt=""></a>
    <p class="mb-0" style="color:#7CBB00">โปรแกรมบริหารคลินิก</p>
    <footer class="blockquote-footer">พัฒนา โดย <cite title="Source Title">นาย ประดิษฐ์  ระหา</cite></footer>
</blockquote> 
  <!--================Blog section end =================-->  


  <script src="{{ asset('vendors_food/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors_food/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors_food/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors_food/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors_food/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js_food/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('js_food/mail-script.js') }}"></script>
  <script src="{{ asset('js_food/main.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
 
  <script>
        $(document).ready(function(){
            $("#btn1").click(function(){
                toastr["info"](" datasave","title");
            });
      
                toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        };
                    });
                   
                    $("#btn2").click(function(){
                toastr["info"](" datasave","title");
                    });
            
                        toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                };
                    
                    
    </script>


<script>
  $(document).ready(function(){
  

    $(document).on('click','#supdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');
            
      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'post',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='index';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
      });

      
    $(document).on('click','#perdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');
            
      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'post',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='/Mainpage/clinic_per';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
      });

      $(document).on('click','#symdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');
            
      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'post',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                            window.location.href='/sym/sym_index';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
      });
     

    });
</script>

</body>
</html>