  
   <link rel="stylesheet" href="{{ asset('vendors_food/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css_food/style.css') }}">
  
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
                  <li class="nav-item"><a class="nav-link" href="{{ url('/settingdashboard')}}">ตั้งค่า</a></li>
                  <li class="nav-item "><a class="nav-link" href="{{ route('Clinic.index')}}">ลงทะเบียนคนไข้</a></li>
                
              </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->