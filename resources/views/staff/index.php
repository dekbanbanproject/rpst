@extends('layouts.adminlte_hos')

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
            @foreach($allData as $key => $item)
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                        {{DateThai($item->created_at)}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>

                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          {{-- <span class="time"><i class="far fa-clock"></i>   </span> --}}
                                <a href="" class="time btn btn-sm btn-success shadow-lg" style="font-family: sans-serif;color:white" data-toggle="modal" data-target="#AddModal">กำหนดสิทธิ์</a>
                          <h3 class="timeline-header"><a href="#">Name</a> => ชื่อ-นามสกุล</h3>

                          <div class="timeline-body">
                          {{$item->name}} &nbsp;&nbsp; {{$item->lname}}
                          </div>
                          <div class="timeline-footer">

                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                      <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                          <h3 class="timeline-header"><a href="#">Email</a> => อีเมล์</h3>
                          <div class="timeline-body">
                          {{$item->email}}
                          </div>
                          <div class="timeline-footer">
                            <a href="{{ url('staff/edit/'.$item->id) }}" class="btn btn-warning btn-sm"><span style="font-size: 1em; color: white;"><i class="fas fa-fw fa-edit"></i> </span>Edit</a>
                        @if((Auth::user()->status) == 'ADMIN' )

                            <a title="Delete" id="staffdelete" class="btn btn-sm btn-danger" href="{{ route('staff.destroy',$item->id)}}" data-token="{{csrf_token()}}" data-id="{{$item->id}}"><i class="fas fa-fw fa-trash"></i> Delete</a>
                          @endif
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->

                        <!-- timeline item -->
                        <div>
                      <i class="fas fa-warehouse bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Store</a> => สถานพยาบาล</h3>
                          <div class="timeline-body">
                          {{$item->LOCATE_NAME}}
                          </div>
                          <div class="timeline-footer">

                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->

                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Picture</a> => รูปภาพ</h3>

                          <div class="timeline-body">
                          <center>
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($item->img)) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture" >
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($item->cid, 'QRCODE',5,5) . '" alt="qrrcode"  height="120px" width="120px" />'; ?>
                            </center>
                          </div>
                        </div>
                      </div>



                    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header shadow lg">
                                        <h5 style="color:#ffff">กำหนดสิทธิ์&nbsp;&nbsp;</h5>
                                    </div>
                                    <div class="modal-body shadow lg">
                                    <form action="{{ route('staff.permiss_save')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf

                                                <input type="text" name="PERMISS_LIST_USER" id="PERMISS_LIST_USER" value = {{$item->id}}>

                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label for="">สิทธิ์ทั้งหมด</label>
                                                    <table class="table table-hover" style="width: 100%">
                                                        <thead>
                                                            <th align="center" width="30px">สิทธิ์</th>
                                                            <th align="center">สถานะ</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($permiss as $key => $pml)

                                                                <tr>
                                                                    <input type="hidden" name="PERMISS_CODE" id="PERMISS_CODE" value="{{$pml->PERMISS_CODE}}">
                                                                    <td align="center"><input  name ="PERMISS_TEXT_EN" id="PERMISS_TEXT_EN" class="form-control" value="{{$pml->PERMISS_TEXT_EN}}"></td>
                                                                    <td align="center"  width="5%">
                                                                        <div class="custom-control custom-switch custom-control-lg ">
                                                                            @if($pml-> PERMISS_STATUS == 'True' )
                                                                                <input type="checkbox" class="custom-control-input" id="{{ $pml-> PERMISS_ID }}" name="{{ $pml-> PERMISS_ID }}" onchange="switchactivepermiss({{ $pml-> PERMISS_ID }});" checked>
                                                                            @else
                                                                                <input type="checkbox" class="custom-control-input" id="{{ $pml-> PERMISS_ID }}" name="{{ $pml-> PERMISS_ID }}" onchange="switchactivepermiss({{ $pml-> PERMISS_ID }});">
                                                                            @endif
                                                                                <label class="custom-control-label" for="{{ $pml-> PERMISS_ID }}"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-7">
                                                    <label for="" style="font-family: sans-serif;color:orange">สิทธิ์เจ้าหน้าที่</label>
                                                        <table class="table table-hover" style="width: 100%">
                                                            <thead>
                                                                <th style="font-family: sans-serif;color:orange" align="center" wide="30px">สิทธิ์</th>
                                                                <th style="font-family: sans-serif;color:orange" align="center">สถานะ</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($permiss_list as $key => $pmll)
                                                                    <tr>
                                                                        <td><input  name ="PERMISS_CODE" id="PERMISS_CODE" class="form-control"></td>
                                                                        <td align="center" width="5%">

                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>

                                            <div class="modal-footer shadow lg">
                                                    <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>





                    <!-- <select name="PERMISS_ID[]" id="PERMISS_ID[]" class="form-control" >
                        <option value="">--เลือก--</option>
                        @foreach ($pms as $pm)
                            <option value="{{ $pm ->PERMISS_ID }}">{{$pm->PERMISS_TEXT_EN}}</option>
                        @endforeach
                    </select> -->







                      @endforeach
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
