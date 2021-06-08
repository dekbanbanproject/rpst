@extends('layouts.adminlte_medical')
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
        $idstore =  Auth::user()->store_id;
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
            <h1 class="m-0 text-dark">สถานพยาบาล</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">สถานพยาบาล</li>
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
        .card-p{
            margin-left: 200px;
            margin-right: 200px;
        }
        .content-header{
            margin-left: 200px;
            margin-right: 200px;
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
<section class="col-md-12">
    <div class="card-p shadow mb-4 ">
        <div class="card-header shadow lg py-3 ">
            <h6 class="float-sm-left  font-weight-bold text-primary">สถานพยาบาล</h6>
            <a href="" class="float-sm-right btn btn-sm btn-success shadow-lg" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp; เพิ่มสถานพยาบาล</a>
        </div>

        <div class="card-body shadow lg">
            <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="10%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" >รหัสสถานพยาบาล</th>
                            <th style="text-align: center;color:#7B0099" >ชื่อสถานพยาบาล</th>
                          
                            <th style="text-align: center;color:#7B0099"width="15%">จัดการ</th>
                           

                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($locates as $locate)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td style="text-align: center;">{{$locate->LOCATE_CODE }}</td>
                                    <td style="text-align: center;">{{$locate->LOCATE_NAME }}</td>
                                    <td style="text-align: center;">
                                        @if((Auth::user()->user_edit) == 'on' )
                                        <a href="" data-toggle="modal" data-target="#EditModal{{$locate->LOCATE_ID}}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:orange'></i></a>
                                        @endif
                                        @if((Auth::user()->user_delete) == 'on' ) 
                                        <a title="Delete" id="locatedelete"  href="{{ url('setting/locatedestroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$locate->LOCATE_ID)}}" data-token="{{csrf_token()}}" data-id="{{$locate->LOCATE_ID}}"><i class="fas fa-fw fa-trash" style='font-size:15px;color:red'></i></a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Edit/.largeModal-->
                                <div class="modal fade" id="EditModal{{$locate->LOCATE_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                    <div class="modal-header shadow lg">
                                                        <h5 style="color:#ffff">แก้ไขสถานพยาบาล&nbsp;&nbsp;</h5>
                                                    </div>
                                                    <div class="modal-body shadow lg">
                                                        <form action="{{ route('setting.locate_update')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                                                            <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >

                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-12 text-left">
                                                                    <label for="locate_code">รหัสสถานพยาบาล :</label>
                                                                    <input value="{{$locate->LOCATE_CODE}}"  name ="LOCATE_CODE" id="locate_code" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-12 text-left">
                                                                    <label for="locate_name">ชื่อสถานพยาบาล :</label>
                                                                    <input value="{{$locate->LOCATE_NAME}}"  name ="LOCATE_NAME" id="locate_name" class="form-control"required >
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="{{$locate->LOCATE_ID}}"  name ="LOCATE_ID" id="LOCATE_ID" class="form-control" >
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


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header shadow lg">
                            <h5 style="color:#ffff">เพิ่มสถานพยาบาล&nbsp;&nbsp;</h5>
                        </div>
                        <div class="modal-body shadow lg">
                            <form action="{{ route('setting.locate_save')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                            <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >

                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="locate_code">รหัสสถานพยาบาล :</label>
                                        <input  name ="LOCATE_CODE" id="locate_code" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="locate_name">ชื่อสถานพยาบาล :</label>
                                        <input  name ="LOCATE_NAME" id="locate_name" class="form-control" required>
                                    </div>
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
    </div>
</section>
<script>
    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
    }

</script>
@endsection
