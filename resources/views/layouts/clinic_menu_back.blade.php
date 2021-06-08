
  
  
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

              <!-- <li class="nav-item "><a class="nav-link" href="{{ url('sym/sym_index')}}">รายการรักษา</a></li>  -->
              <!-- <li class="nav-item"><a class="nav-link" href="{{ url('mcontact')}}">ติดต่อเรา</a></li> -->
              

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