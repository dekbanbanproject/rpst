@extends('layouts.adminlte_report')

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
    <div class="container-fluid" style="width: 95%">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size:25px">Repor Recieve</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">รับเข้า</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
        <div class="container-fluid" style="width: 95%">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                                <h5 style="font-family: sans-serif;color:red;">รายงาน</h5>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" >Bill No  || วันที่</label>
                                    @foreach($recieve_reps as $key => $recieve_rep)
                                        <div class="col-sm-12">
                                        <p style="font-family: font-size:13px"><a href="{{url('report/report_recieve_rep/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$recieve_rep->REC_ID )}}"> {{ $recieve_rep->REC_BILLNO}} || {{ DateThai($recieve_rep->REC_DATE)}}</a>
                                        <a href="{{url('report/excel_recieve/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$recieve_rep->REC_ID)}}" class="float-sm-right btn btn-sm btn-info shadow-lg"><i class="fas fa-file-excel text-white-90" style="font-size:15px "></i>&nbsp;&nbsp; Export to Excel&nbsp;&nbsp;</a>
                                    </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr style="background-color: orange">
                            <hr style="background-color: orange">

                                <form action="{{route('repo.report_recieve_search')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="STORE_ID" id="STORE_ID" value="{{(Auth::user()->store_id)}}">
                                    <input type="hidden" name="USER_ID" id="USER_ID" value="{{(Auth::user()->id)}}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" name ="START_DATE" id="START_DATE" class="form-control datepicker" data-date-format="dd/mm/yyyy ">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" name ="END_DATE" id="END_DATE" class="form-control datepicker" data-date-format="dd/mm/yyyy ">
                                            </div>
                                        </div>

                            <hr style="background-color: orange">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="" >Bill No  || วันที่</label>
                                                @foreach($recieve_rep_searchs as $key => $recieve_rep_search)
                                                    <div class="col-sm-12">
                                                    <p style="font-family: font-size:13px">{{ $recieve_rep_search->REC_BILLNO}} || {{ DateThai($recieve_rep_search->REC_DATE)}}
                                                    <a href="{{url('report/excel_recieve/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$recieve_rep_search->REC_ID)}}" class="float-sm-right btn btn-sm btn-info shadow-lg"><i class="fas fa-file-excel text-white-90" style="font-size:15px "></i>&nbsp;&nbsp; Export to Excel&nbsp;&nbsp;</a>
                                                </p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>



                                        </div>

                        <div class="card-footer">
                            <a href="{{url('report/report_recieve/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="btn btn-sm btn-danger shadow-lg"><i class="fas fa-reply-all text-white-90" style="font-size:15px ">&nbsp;&nbsp;</i>&nbsp;&nbsp;&nbsp;ย้อนกลับ&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            <button type="submit" class="float-sm-right btn btn-sm btn-success shadow-lg"><i class="fas fa-search text-white-50" style="font-size:15px ">&nbsp;&nbsp;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ค้นหา &nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header text-center">
                                <h5 style="font-family: sans-serif;color:blue;">รายละเอียด &nbsp;&nbsp; </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th align="center" width="5%">ลำดับ</th>
                                        <th >icode</th>
                                        <th >รายการยา</th>
                                        <th >จำนวน</th>
                                        <th >หน่วย</th>
                                        <th >ราคา</th>
                                        <th >รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recieve_reviews as $key => $item)
                                    <tr>
                                        <td align="center" width="5%"> {{$key+1}}</td>
                                        <td >{{$item->STORE_RECIEVE_DRUG_CODE}}</td>
                                        <td>{{$item->STORE_RECIEVE_DRUG_NAME}}</td>
                                        <td width="10%">{{$item->STORE_RECIEVE_DRUG_QTY}}</td>
                                        <td width="15%">{{$item->UNIT_NAME}}</td>
                                        <td width="15%">{{$item->STORE_RECIEVE_DRUG_PRICE}}</td>
                                        <td width="15%">{{$item->STORE_RECIEVE_DRUG_TOTAL}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                <tr>
                                    <td></td><td></td><td></td><td></td><td></td>
                                    <td align="center" style="color: orangered;font-size:25px;"><b>Total</b></td>
                                    <td align="center" style="color: rgb(121, 16, 250);font-size:25px;"><b>{{$sum_recieve_review}}</b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-footer">
                            <a href="{{url('report/report_recieve/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="btn btn-sm btn-danger shadow-lg"><i class="fas fa-reply-all text-white-90" style="font-size:15px ">&nbsp;&nbsp;</i>&nbsp;&nbsp;&nbsp;ย้อนกลับ&nbsp;&nbsp;&nbsp;&nbsp;</a>

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
