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
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
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
        .card-p{
            margin-left: 200px;
            margin-right: 200px;
        }
        .card-p-1{
            margin-left: 100px;
            margin-right: 30px;
        }
        .content-header-1{
            margin-left: 200px;
            margin-right: 200px;
        }
</style>
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid" style="width: 90%">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size:25px">กำหนดสิทธิ์</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">กำหนดสิทธิ์</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
        <div class="container-fluid" style="width: 90%">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header text-center">
                                <h5 style="font-family: sans-serif;color:red;">กำหนดสิทธิ์เจ้าหน้าที่</h5>
                        </div>
                        <div class="card-body">
                        <form action="{{route('staff.permisslist_save')}}" method="post">
                            @csrf
                            <input type="hidden" name="PERMISS_LIST_USER" id="PERMISS_LIST_USER" value="{{$pmls->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="HOS_MISS" name="HOS_MISS" >&nbsp;&nbsp; Hosxp_Pcu &nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="CLAIM_MISS" name="CLAIM_MISS" >&nbsp;&nbsp; งานเคลม &nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="col-sm-12">
                                        <input type="checkbox" id="MEDICAL_MISS" name="MEDICAL_MISS" >&nbsp;&nbsp; คลังยาและเวชภัณฑ์ &nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="DELETE_MISS" name="DELETE_MISS">&nbsp;&nbsp; DELETE &nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="EDIT_MISS" name="EDIT_MISS">&nbsp;&nbsp; EDIT &nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="ADD_MISS" name="ADD_MISS">&nbsp;&nbsp; ADD &nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="REPORT_MISS" name="REPORT_MISS" >&nbsp;&nbsp; Report &nbsp;&nbsp;
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

                                <button type="submit" class="float-right btn btn-sm btn-success"><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;&nbsp;บันทึก&nbsp;&nbsp;</button>

                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="card">
                        @foreach($permiss_u as $key => $item)
                        <div class="card-header text-center">
                                <h5 style="font-family: sans-serif;color:blue;">สิทธิ์เจ้าหน้าที่ &nbsp;&nbsp;
                                    ( {{$item->name}} &nbsp; {{$item->lname}} )
                                </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="HOS_MISS" name="HOS_MISS" <?php if($item->user_hos == 'on'){echo "checked";} ?>>&nbsp;Hosxp_Pcu
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="CLAIM_MISS" name="CLAIM_MISS" <?php if($item->user_claim == 'on'){echo "checked";} ?>>&nbsp;งานเคลม
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="MEDICAL_MISS" name="MEDICAL_MISS" <?php if($item->user_medic == 'on'){echo "checked";} ?>>&nbsp;คลังยาและเวชภัณฑ์
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="DELETE_MISS" name="DELETE_MISS" <?php if($item->user_delete == 'on'){echo "checked";} ?>>&nbsp;DELETE
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="EDIT_MISS" name="EDIT_MISS" <?php if($item->user_edit == 'on'){echo "checked";} ?>>&nbsp;EDIT
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="ADD_MISS" name="ADD_MISS" <?php if($item->user_add == 'on'){echo "checked";} ?>>&nbsp;ADD
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="REPORT_MISS" name="REPORT_MISS" <?php if($item->user_rep == 'on'){echo "checked";} ?>>&nbsp; Report
                                    </div>

                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="card-footer">
                            <a href="{{url('staff/index')}}" class="btn btn-sm btn-warning"><i class="fas fa-reply-all fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;&nbsp;ย้อนกลับ&nbsp;&nbsp;</a>
                        </div>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </div>


@endsection
