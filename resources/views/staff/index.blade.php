@extends('layouts.adminlte_home')

@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
<?php
    if(Auth::check()){
        $status = Auth::user()->status;
        $id_user = Auth::user()->name;
        $idd_user = Auth::user()->id;
        // $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
        .container-fluid-boxs{

        }
        .card{
            margin-left: 20px;
            margin-right: 20px;
        }
        .content-header{
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
<?php
        function DateThai($strDate)
        {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
        }
        function formate($strDate)
        {
        $strYear = date("Y",strtotime($strDate));
        $strMonth= date("m",strtotime($strDate));
        $strDay= date("d",strtotime($strDate));

        return $strDay."/".$strMonth."/".$strYear;
        }
        function formatetime($strtime)
        {
        $H = substr($strtime,0,5);
        return $H;
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture" >

                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">{{ Auth::user()->status }}</p><br>
                <center>
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG(Auth::user()->cid, 'QRCODE',5,5) . '" alt="qrrcode"  height="60px" width="60px" />'; ?>
                </center><br>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Facebook</b> <a class="float-right">{{ Auth::user()->facebook }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Line ID</b> <a class="float-right">dekbanbanproject</a>
                  </li>
                  <li class="list-group-item">
                    <b>Line Token</b> <a class="float-right">{{ Auth::user()->linetoken }}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active " href="{{ route('staff.create') }}" ><i class="fas fa-user bg-primary"></i>&nbsp;&nbsp;&nbsp;เพิ่มเจ้าหน้าที่</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">

                        <!-- timeline item -->
                            <div>
                                <i class="fas fa-user bg-info"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="#">Name</a> => ชื่อ-นามสกุล</h3>
                                        <div class="timeline-body">
                                            <table class="table table-hover" style="width: 100%">
                                                <thead>
                                                    <th align="center" width="5%">ลำดับ</th>
                                                    <th align="center" width="20%">cid</th>
                                                    <th align="center">ชื่อ-นามสกุล</th>
                                                    <th align="center" width="20%">email</th>
                                                    <th align="center" width="30%">จัดการ</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($allData as $key => $item)
                                                    <tr>
                                                        <td align="center"> {{$key+1}}</td>
                                                        <td >{{$item->cid}}</td>
                                                        <td>{{$item->name}} &nbsp;&nbsp; {{$item->lname}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>
                                                            @if((Auth::user()->status) == 'SUPER_ADMIN')
                                                            <a href="{{url('staff/permisslist/'.$item->id)}}" class="time btn btn-sm btn-success shadow-lg" style="font-family: sans-serif;color:white">กำหนดสิทธิ์</a>

                                                            <a href="{{url('staff/edit/'.$item->id)}}" class="time btn btn-sm btn-warning shadow-lg" style="font-family: sans-serif;color:white">แก้ไข</a>

                                                            <a href="{{url('staff/destroy/'.$item->id)}}" class="time btn btn-sm btn-danger shadow-lg" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" style="font-family: sans-serif;color:white" >ลบ</a>
                                                            @endif
                                                        </td>

                                                    </tr>

                                                    <div class="modal fade" id="AddModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                    <div class="modal-header shadow lg">
                                                                        <h5 style="color:#ffff">กำหนดสิทธิ์&nbsp;&nbsp;</h5>
                                                                    </div>
                                                                    <div class="modal-body shadow lg">

                                                                            <input type="hidden" name="PERMISS_LIST_USER" id="PERMISS_LIST_USER" value = {{$item->id}}>

                                                                            <div class="row" id="object1">

                                                                                @foreach($pms as $pm)

                                                                                    <div class="col-sm-6">
                                                                                        <input name="PERMISS_CODE" id="PERMISS_CODE" class="form-control" value = {{$pm->PERMISS_CODE}}>
                                                                                    </div>
                                                                                    <div class="col-sm-5">
                                                                                        <input name="PERMISS_TEXT_EN" id="PERMISS_TEXT_EN" class="form-control" value = {{$pm->PERMISS_TEXT_EN}}>
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        {{-- <a class="btn btn-sm btn-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt" ></i></a> --}}
                                                                                    </div>

                                                                                @endforeach

                                                                            </div>


                                                                    </div>



                                                            </div>
                                                        </div>
                                                    </div>


                                                    @endforeach



                                                </tbody>
                                            </table>
                                        </div>
                                <div class="timeline-footer">

                                </div>
                            </div>
                            </div>
                        <!-- END timeline item -->

                    </div>
                  </div>
                  <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        function switchactivepermiss(permiss){

            var checkBox=document.getElementById(permiss);
            var onoff;

            if (checkBox.checked == true){
               onoff = "True";
                } else {
                    onoff = "False";
                }

            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('staff.switchactivepermiss')}}",
                        method:"GET",
                        data:{onoff:onoff,permiss:permiss,_token:_token}
                })
            }
    </script>

@endsection
