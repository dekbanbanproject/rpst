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
            <h1 class="m-0 text-dark">รายการ เบิก-จ่ายยา</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายการ เบิก-จ่ายยา</li>
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
            margin-left: 80px;
            margin-right: 80px;
        }
        .content-header{
            margin-left: 80px;
            margin-right: 80px;
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
    <div class="card-p shadow lg">
        <div class="card-header shadow lg ">
            <h6 class="float-sm-left  font-weight-bold text-primary">รายการ เบิก-จ่ายยา</h6>
            <a href="{{url('setting/pay_drug_add/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-sm btn-success shadow-lg" ><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp;&nbsp; เบิก-จ่ายยา</a>
        </div>

        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="3%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="10%">วันที่</th>
                            <th style="text-align: center;color:#7B0099" width="15%">เลขที่บิล</th>
                            <th style="text-align: center;color:#7B0099" >คลังที่เบิก</th>
                            <th style="text-align: center;color:#7B0099" width="15%">เจ้าหน้าที่</th>
                            <th style="text-align: center;color:#7B0099" width="15%">Total</th>
                            <th style="text-align: center;color:#7B0099"width="10%">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($pays as $pay)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td style="text-align: center;">{{DateThai($pay->PAY_DATE) }}</td>
                                    <td style="text-align: center;">{{ $pay->PAY_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $pay->LOCATE_NAME}}</td>
                                    <td style="text-align: center;">{{ $pay->name}}  &nbsp;&nbsp; {{ $pay->lname}}</td>
                                    <td style="text-align: center;">{{ $pay->PAY_TOTAL}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('setting/pay_print/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID )  }}" ><i class="fas fa-print" style='font-size:15px;color:rgb(247, 0, 255)'></i> </a>
                                        &nbsp;&nbsp;
                                        @if((Auth::user()->user_edit) == 'on' )
                                        <a href="{{ url('setting/pay_drug_edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID )  }}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:orange'></i></a>
                                        
                                        @endif
                                        &nbsp;&nbsp;
                                        @if((Auth::user()->user_delete) == 'on' ) 
                                        <a href="{{ url('setting/pay_drug_destroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID)}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" ><i class="fas fa-fw fa-trash" style='font-size:15px;color:red'></i></a>

                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>


        </div>
    </div>
</div>
</section>

<script>
$('.addRow').on('click',function(){
         addRow();
     });
     function addRow(){
        var count = $('.tbody1').children('tr').length;
        var tr ='<tr>'+
                '<td style="text-align: center;">'+
                (count+1)+
                '</td>'+
                '<td>'+
                '<select name="RECDETAIL_DRUG_ID[]" id="RECDETAIL_DRUG_ID[]" class="form-control">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($drugs as $drug)'+
                '<option value="{{ $drug ->DRUG_ID }}">{{ $drug-> DRUG_NAME}}</option>'+
                '@endforeach' +
                '</select>'+
                '</td>'+
                '<td>'+
                '<select name="RECDETAIL_DRUG_UNIT[]" id="RECDETAIL_DRUG_UNIT[]" class="form-control" >'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($units as $unit)'+
                '<option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option> '+
                '@endforeach' +
                '</select>'+
                '</td>'+
                '<td>'+
                '<input name="RECDETAIL_DRUG_QTY[]" id="RECDETAIL_DRUG_QTY[]" class="form-control">'+
                '</td>'+
                '<td>'+
                '<input name="RECDETAIL_DRUG_PRICE[]" id="RECDETAIL_DRUG_PRICE[]" class="form-control input-sm">'+
                '</td>'+
                '<td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };

     $('.tbody1').on('click','.remove', function(){
            $(this).parent().parent().remove();

     });
</script>


@endsection
