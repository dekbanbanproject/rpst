
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

          <li class="nav-header">Report</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                รายงาน
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{url('report/report_orders/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                        <i class="fas fa-chart-area nav-icon"></i>
                            <p>รายงานสั่งซื้อ</p>
                        <span class="badge badge-danger right">&nbsp;{{ $order_rep_count }}&nbsp;</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('report/report_recieve/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                        <i class="fas fa-chart-bar nav-icon"></i>
                            <p>รายงานการรับเข้า</p>
                        <span class="badge badge-danger right">&nbsp;{{ $recieve_rep_count }}&nbsp;</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('report/report_pays/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link">
                        <i class="fas fa-chart-pie nav-icon"></i>
                            <p>รายงานการเบิกจ่าย</p>
                        <span class="badge badge-danger right">&nbsp;{{ $pay_rep_count}}&nbsp;</span>
                    </a>
                </li>


            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
