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
          @foreach($data_hos  as $item )
          <label for=""  style='font-size:30px;color:rgb(253, 77, 7)'><cite title="Source Title">{{$item->hospitalname}}</cite></label>
          @endforeach
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
                  aria-expanded="false">เข้าสู่ระบบ</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('login')}}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('register')}}">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('QrLogin')}}">QrLogin</a></li>
                </ul>
			        </li>

              <li class="nav-item"><a class="nav-link" href="{{ url('mcontact')}}">ติดต่อเรา</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
