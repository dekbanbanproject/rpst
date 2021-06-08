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
        <h1 class="h3 mb-0 text-gray-800">รายการสั่งซื้อ</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" style="font-size:24px "></i> Add</a>
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
                            <th style="text-align: center;">Order ID</th>                           
                            <th style="text-align: center;">เลขที่บิล</th> 
                            <th style="text-align: center;">วันที่</th> 
                            <th style="text-align: center;">ตัวแทนจำหน่าย</th> 
                            <th style="text-align: center;">ผู้สั่ง</th>  
                            <th style="text-align: center;">Total Qty</th> 
                            <th style="text-align: center;">Total PRICE</th>                                                                                           
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($orders as $order)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>  
                                    <td style="text-align: center;">{{ $order->ORDER_ID}}</td>                           
                                    <td style="text-align: center;">{{ $order->ORDER_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_DATE}}</td>
                                    <td style="text-align: center;">{{ $order->SUP_NAME}}</td>
                                    <td style="text-align: center;">{{ $order->PERSON_FNAME}}&nbsp;&nbsp; {{ $order-> PERSON_LNAME}}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_TOTAL_QTY}}</td>
                                    <td style="text-align: center;">{{ $order->ORDER_TOTAL_PRICE}}</td>
                                    
                                    <td style="text-align: center;">
                                    <!-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $order->ORDER_ID}}"><i class="fas fa-qrcode"></i></button> -->
                                    <a href="{{ url('products/ordersedit/'.$order->ORDER_ID )}}" class="btn btn-sm btn-info" ><i class="fas fa-qrcode"></i></a>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $order->ORDER_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-example-modal-xl{{ $order->ORDER_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/orders/destroy/'.$order->ORDER_ID )}}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการที่จะลบใบสั่งซื้อ No. {{ $order->ORDER_BILLNO}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            

                            <div class="modal fade bd-example-modal-xl{{ $order->ORDER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="card-body">
                                        <div class="row push">
                                            <div class="col-md-3"> 
                                                <label>{{$order->ORDER_BILLNO}}</label>

                                            </div>
                                            <div class="col-md-3"> 
                                                <label>{{$order->ORDER_DATE}}</label>
                                            </div>
                                            <div class="col-md-3"> 
                                                <label>{{$order->SUP_NAME}}</label>
                                            </div>
                                            <div class="col-md-3"> 
                                                <label>{{$order->PERSON_FNAME}}&nbsp; {{$order->PERSON_LNAME}}</label>
                                            </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!-- Delete/.smalModal-->
                        <div class="modal fade" id="deleteModal{{ $order->ORDER_ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="" method="POST">
                                <div class="modal-body">z
                                คุณต้องการลบ {{ $order->ORDER_ID}} ใช่หรือไม่?
                                </div>
                                <input type="hidden" name="ORDER_ID" value="{{ $order->ORDER_ID}}">
                                <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>

                        @endforeach                                                  
                    </tbody>
                </table>     
            </div>
        </div>
    </div>
</div> 
</div>

<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{ route('O.saveorders') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">ORDER</h4>                   
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;Save </button>
                </div>
                <div class="modal-body">                   
                        <div class="row push">
                            <div class="col-md-0.5">
                                &nbsp; เลขที่บิล &nbsp;
                            </div>
                            <div class="col-md-3">                            
                                <input value="{{$refnumbers}}" name ="ORDER_BILLNO" id="ORDER_BILLNO" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                            </div>
                            <div class="col-md-0.5 text-right">
                                &nbsp;Supplies &nbsp;
                            </div>             
                            <div class="col-md-4">
                                <span>                            
                                    <select name="ORDER_SUP" id="ORDER_SUP" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                        <option value="">--กรุณาเลือก Supplies--</option> 
                                        @foreach ($supps as $supp)
                                            <option value="{{ $supp -> SUP_ID  }}">{{ $supp-> SUP_NAME}}</option>
                                        @endforeach
                                    </select>                           
                                </span>
                            </div> 
                            <div class="col-md-0.5 text-right">
                                &nbsp;วันที่ &nbsp;
                            </div>                        
                            <div class="col-md-3 mr-auto">
                                <input type="date" name = "ORDER_DATE"  id="ORDER_DATE"  class="form-control input-lg datepicker" data-date-format="mm/dd/yyyy" >  
                            </div> 
                        </div> 
                        <br>   
                        <div class="row push">                            
                            <div class="col-md-3">
                                    &nbsp;&nbsp;
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="col-md-0.5 text-right">
                                    &nbsp;ปี&nbsp;
                                </div>             
                            <div class="col-md-4">
                                <span>                            
                                    <select name="ORDER_YEAR" id="ORDER_YEAR" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                        <option value="">--กรุณาเลือกปีงบประมาณ--</option> 
                                        @foreach ($budgets as $budget)
                                            <option value="{{ $budget -> YEAR_ID  }}">{{ $budget-> YEAR_ID}}</option>
                                        @endforeach
                                    </select>                           
                                </span>
                            </div>                       
                            <div class="col-md-0.5 text-right">
                            &nbsp;ผู้สั่ง &nbsp;
                            </div>                        
                            <div class="col-md-3 mr-auto">                                   
                                    <span>
                                        <select name="ORDER_STAFF" id="ORDER_STAFF" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                            <option value="">--กรุณาเลือกผู้สั่ง--</option> 
                                            @foreach ($Persons as $Person)
                                                <option value="{{ $Person -> PERSON_ID }}">{{ $Person-> PERSON_FNAME}}&nbsp;&nbsp; {{ $Person-> PERSON_LNAME}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                            </div> 
                        </div> 
                <hr> 
                    <div class="row push"> 
                        <div class="col-lg-12">
                            <div class="card">                             
                                <div class="card-body">
                                    <div class="row push">
                                        <div class="col-lg-12">
                                            <!-- Block Tabs Default Style -->
                                            <div class="block block-rounded block-bordered">
                                                <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(255, 78, 12);">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการสินค้า</a>
                                                    </li>  
                                                </ul>
                                                    <div class="block-content tab-content">
                                                    <div class="tab-pane active" id="object1" role="tabpanel"> 
                                                            <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <td style="text-align: center;"width="5%">ลำดับ</td>
                                                                        <!-- <td style="text-align: center;" width="10%">ICODE</td>  -->
                                                                        <td style="text-align: center;">รายการยา</td>                                                                      
                                                                        <td style="text-align: center;" width="10%">จำนวน</td>  
                                                                        <td style="text-align: center;" width="15%">หน่วย</td>  
                                                                        <td style="text-align: center;" width="15%">ราคา</td>                                                      
                                                                        <td style="text-align: center;" width="7%"><a  class="btn btn-sm btn-success addRow1" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a></td>
                                                                    </tr>
                                                                </thead> 
                                                                <tbody class="tbody1"> 
                                                                        <tr>
                                                                            <td style="text-align: center;"> 1 </td>
                                                                            
                                                                            <td> 
                                                                                <select name="ORDERDETAIL_PRO_NAME[]" id="ORDERDETAIL_PRO_NAME[]" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                                                    <option value="">--กรุณาเลือกรายการยา--</option> 
                                                                                    @foreach ($Products as $Product)
                                                                                        <option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>
                                                                                    @endforeach                                                                                                                                                                    
                                                                                </select>
                                                                            </td>                                                                               
                                                                            <td>
                                                                             <input name="ORDERDETAIL_PRO_QTY[]" id="ORDERDETAIL_PRO_QTY[]" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                                            </td>
                                                                            <td>
                                                                            <select name="ORDERDETAIL_PRO_UNITS[]" id="ORDERDETAIL_PRO_UNITS[]" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                                                <option value="">--กรุณาเลือก--</option> 
                                                                                    @foreach ($UNTS as $Unt)
                                                                                        <option value="{{ $Unt -> UNITS_ID }}">{{ $Unt-> UNITS_NAME}}</option>
                                                                                    @endforeach                                                                                                                                                                    
                                                                            </select> 
                                                                            </td>
                                                                            <td>
                                                                             <input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE[]" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                                            </td>
                                                                            <td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>
                                                                        </tr>                                                                 
                                                                </tbody>   
                                                            </table>
                                                         
                                                            <div class="row justify-content-between">
                                                                   
                                                        </div>
                                                    
                                     
                                                </div>
                                            </div>
                                        </div>                
                                    </div>
                                                                     
                                </div>
                            </div>                                                          
                        </div>                       
                    </div>
                </div>
            </form>                                    
               
                <div class="modal-footer">
                  
                </div>
            </div>
         
      </div>
  </div>

</div>

<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>
<script>

    $('.addRow1').on('click',function(){
         addRow1();
     });
     function addRow1(){
        var count = $('.tbody1').children('tr').length;
        var tr ='<tr>'+
                '<td style="text-align: center;">'+
                (count+1)+
                '</td>'+
                '<td>'+
                '<select name="ORDERDETAIL_PRO_NAME[]" id="ORDERDETAIL_PRO_NAME[]" class="form-control input-lg">'+               
                '<option value="">--กรุณาเลือกรายการยา--</option>'+ 
                '@foreach ($Products as $Product)'+
                '<option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>'+
                '@endforeach'+
                '</select> '+
                '</td>'+               
                '<td>'+
                '<input name="ORDERDETAIL_PRO_QTY[]" id="ORDERDETAIL_PRO_QTY[]" class="form-control input-lg items">'+
                '</td>'+ 
                '<td>'+
                '<select name="ORDERDETAIL_PRO_UNITS[]" id="ORDERDETAIL_PRO_UNITS[]" class="form-control input-lg" style=" font-family: \'Kanit\', sans-serif;">'+
                '<option value="">--กรุณาเลือก--</option>'+ 
                '@foreach ($UNTS as $Unt)'+
                '<option value="{{ $Unt -> UNITS_ID }}">{{ $Unt-> UNITS_NAME}}</option>'+
                '@endforeach '+                                                                                                                                                                   
                '</select>'+                                                                                         
                '</td>'+ 
                '<td>'+
                '<input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE[]" class="form-control input-lg" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td> '+           
                '<td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove1', function(){
            $(this).parent().parent().remove(); 
                
     });

</script>


@endsection