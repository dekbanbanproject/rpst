
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-warning elevation-4">
 <center>
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      {{-- <img src="{{ asset('/img/logo/logos.gif') }}" alt="Projectbannok" class="img-thumbnail" style="opacity: .8; height:40px; width:200px;"> --}}
      {{-- <img src="{{ asset('/img/logo/ss.png') }}" alt="" style="height:40px; width:40px;"> --}}
      <img src="{{ asset('/img/logo/ss.png') }}" alt="" style="height:40px; width:40px;" style="opacity: .8">
          @foreach($data_hos  as $item )
          <label for=""  style='font-size:15px;color:rgb(8, 204, 129)'><cite title="Source Title">{{$item->hospitalname}}</cite></label>
          @endforeach
      <span class="brand-text font-weight-light"> </span>
    </a>
  </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture" >

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- <li class="nav-item ">
            <a href="{{url('hos/dashboard_hos')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard-Hos
                  <span class="right badge badge-warning">New</span>
                </p>
              </a>
            <a href="{{url('dashbord_medical')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard-Medical
                <span class="right badge badge-info">New</span>
              </p>
            </a>


          </li> --}}

          <li class="nav-header">Profile</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                สมาชิก
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">&nbsp;{{ $user_a }}&nbsp;</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                {{-- <li class="nav-item">
                    <a href="{{url('staff/permiss')}}" class="nav-link">
                        <i class="fas fa-id-badge nav-icon"></i>
                            <p>กำหนดสิทธิ์การใช้งาน</p>
                        <span class="badge badge-info right">&nbsp;{{ $user_a }}&nbsp;</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{url('staff/index')}}" class="nav-link">
                        <i class="fas fa-id-badge nav-icon"></i>
                            <p>เจ้าหน้าที่</p>
                        <span class="badge badge-info right">&nbsp;{{ $user_a }}&nbsp;</span>
                    </a>
                </li>

              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                             <i class="fas fa-door-closed nav-icon"></i>
                              {{ __('Logout') }}
                          </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
