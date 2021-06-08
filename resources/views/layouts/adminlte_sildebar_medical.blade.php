
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-warning elevation-4">
 <center>
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      {{-- <img src="{{ asset('/img/logo/logos.gif') }}" alt="Projectbannok" class="img-thumbnail" style="opacity: .8; height:40px; width:200px;"
          > --}}
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

        

          <li class="nav-header">Setting</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                คลังยา
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-success ">&nbsp;{{ $product_a }}&nbsp;</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('supplier/supindex/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="nav-link">
                  <i class="fas fa-clinic-medical nav-icon"></i>
                  <p>supplier</p>
                  <i class="fas fa-angle-left right"></i>
                <span class="badge badge-success right">&nbsp;{{ $supplier_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/locate/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="nav-link">
                  <i class="fas fa-hospital-alt nav-icon"></i>
                  <p>สถานพยาบาล</p>

                <span class="badge badge-success right">&nbsp;{{ $locate_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/unit/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-tablets nav-icon"></i>
                  <p>หน่วยนับ</p>

                <span class="badge badge-success right">&nbsp;{{ $unit_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/category/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="nav-link">
                  <i class="fas fa-vials nav-icon"></i>
                  <p>หมวดหมู่</p>

                <span class="badge badge-success right">&nbsp;{{ $category_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-pills nav-icon"></i>
                  <p>รายการยา</p>

                <span class="badge badge-success right">&nbsp;{{ $product_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/order/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-envelope-open-text nav-icon"></i>
                  <p>สั่งซื้อ</p>

                <span class="badge badge-success right">&nbsp;{{ $order_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/recieve_drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-file-prescription nav-icon"></i>
                  <p>รับยาเข้าระบบ</p>
                  <span class="badge badge-success right">&nbsp;{{ $recieve_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/pay_drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-hand-holding-medical nav-icon"></i>
                  <p>เบิก-จ่ายยา</p>
                  <span class="badge badge-success right">&nbsp;{{ $pay_a }}&nbsp;</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('setting/sticker/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Print Sticker</p>
                  <span class="badge badge-danger right"></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('readQrcode')}}" class="nav-link">
                  <i class="fas fa-qrcode nav-icon"></i>
                  <p>readQrcode</p>
                  <span class="badge badge-danger right"></span>
                </a>
              </li>

            </ul>
        </li>

        {{-- <li class="nav-header">Profile</li> --}}

            <!-- <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                <i class="nav-icon 	fas fa-pager"></i>
                <p>
                ทะเบียนคนไข้
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-success right">3</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('Clinic.index')}}" class="nav-link">
                    <i class="fas fa-procedures nav-icon"></i>
                    <p>ลงทะเบียนคนไข้</p>
                    <span class="badge badge-success right">{{ $per_a }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('sym/sym_index')}}" class="nav-link">
                    <i class="fas fa-user-md nav-icon"></i>
                    <p>รายการรักษา</p>
                    <span class="badge badge-success right">{{ $sym_a }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('report/report_symindex')}}" class="nav-link">
                    <i class="fas fa-chart-line nav-icon"></i>
                    <p>รายงานการรักษา</p>
                    <span class="badge badge-success right"></span>
                    </a>
                </li>
                </ul>
            </li>  -->

            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-id-card-alt"></i>
                <p>
                    สมาชิก
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">&nbsp;{{ $user_a }}&nbsp;</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
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
            </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
