@extends('layouts.admin')
@section('content')

<style>
    .input{
        width: 300px;
        font-size: 18px;
        margin: 18px;
        padding: 18px;
    }
    .remove{
        width: 35px;
        height: 35px;
        font-size: 20px;
        background-color: tomato;
        color: white;
        border: none;
        border-radius: 15px;
    }
    #addRow{
        width: 35px;
        height: 35px;
        font-size: 20px;
        background-color:lightgreen ;
        color: white;
        border: none;
        border-radius: 15px;
    }
    #getValues{
        width: 130px;
        height: 48px;
        font-size: 16px;
        background-color: lightgreen;
        color: white;
        border: none;
        margin: 20px;
    }
    .button:hover{
        cursor:pointer;
    }
</style>
<div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายละเอียดการสั่งซื้อ</h1>
            <a href="{{url('products/orders')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-back fa-sm text-white-50" ></i> Back</a>
            <!-- <a href="{{ url('products/orderspro')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" ><i class="fas fa-plus fa-sm text-white-50" ></i> Add</a> -->
    
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการยา</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ลำดับ</th>                           
                            <th style="text-align: center;">เลขที่บิล</th> 
                            <th style="text-align: center;">วันที่</th> 
                            <th style="text-align: center;">ตัวแทนจำหน่าย</th> 
                            <th style="text-align: center;">ผู้สั่ง</th>  
                            <th style="text-align: center;">Total Qty</th>                                                                                            
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($order_details as $order_detail)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>                             
                                    <td style="text-align: center;">{{ $order_detail->ORDER_ID}}</td>
                                    <td style="text-align: center;">{{ $order_detail->ORDERDETAIL_PRO_NAME}}</td>
                                    <td style="text-align: center;">{{ $order_detail->ORDERDETAIL_PRO_QTY}}</td>
                                    <td style="text-align: center;">{{ $order_detail->ORDERDETAIL_PRO_PRICE}}</td>
                                    <td style="text-align: center;">{{ number_format($order_detail->ORDERDETAIL_PRO_TOTAL,2)}}</td>
                                    
                                    <td style="text-align: center;"><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $order_detail->ORDERDETAIL_ID}}"><i class="fas fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $order_detail->ORDERDETAIL_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-example-modal-xl{{ $order_detail->ORDERDETAIL_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/order_detail/destroy/'.$order_detail->ORDERDETAIL_ID )}}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการที่จะลบใบสั่งซื้อ No. {{ $order_detail->ORDERDETAIL_ID}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            
                        @endforeach                                                  
                        </tbody>
                </table>     
            </div>
        </div>
    </div>
</div> 
</div>

   
</div>
  </div>

</div>
<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>

@endsection