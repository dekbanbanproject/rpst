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
            <h1 class="m-0 text-dark">รายการสั่งซื้อ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายการสั่งซื้อ</li>
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
            <h6 class="float-sm-left  font-weight-bold text-primary">รายการสั่งซื้อ</h6>
            <a href="{{url('setting/order_add/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-sm btn-success shadow-lg" ><i class="fas fa-cart-plus text-white-90" style="font-size:15px "></i>&nbsp; ทำรายการสั่งซื้อ</a>
        </div>

        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="3%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="10%">วันที่</th>
                            <th style="text-align: center;color:#7B0099" width="12%">เลขที่บิล</th>
                            <th style="text-align: center;color:#7B0099" width="12%">เลขที่ PO</th>
                            <th style="text-align: center;color:#7B0099" >ตัวแทนจำหน่าย</th>
                            <th style="text-align: center;color:#7B0099" width="10%">เจ้าหน้าที่</th>
                            <th style="text-align: center;color:#7B0099" width="10%">Total</th>
                            <th style="text-align: center;color:#7B0099"width="10%">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($orders as $order)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td style="text-align: center;">{{DateThai($order->ORDER_DATE) }}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_BILLPO}}</td>
                                    <td style="text-align: center;">{{ $order->SUP_NAME}}</td>
                                    <td style="text-align: center;">{{ $order->name}}&nbsp;&nbsp; {{ $order->lname}}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_TOTAL}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('setting/order_print/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$order->ORDER_ID )  }}" ><i class="fas fa-print" style='font-size:15px;color:rgb(247, 0, 255)'></i> </a>
                                        &nbsp;&nbsp;
                                        @if((Auth::user()->user_edit) == 'on' )
                                        <a href="{{ url('setting/order_edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$order->ORDER_ID )  }}" ><i class="fas fa-fw fa-edit" style='font-size:15px;color:orange'></i> </a>
                                        @endif
                                        @if((Auth::user()->user_delete) == 'on' ) 
                                        &nbsp;&nbsp; <a href="{{ url('setting/order_destroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$order->ORDER_ID)}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" ><i class="fas fa-fw fa-trash" style='font-size:15px;color:red'></i></a>
                                        {{-- <a title="Delete" id="drugrecdelete" class="btn btn-sm btn-danger" href="{{ route('setting.recieve_drug_destroy',$rec->ORDER_ID)}}" data-token="{{csrf_token()}}" data-id="{{$rec->REC_ID}}"><i class="fas fa-fw fa-trash"></i></a> --}}
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


</script>
@endsection
