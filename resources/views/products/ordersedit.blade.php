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
            <a href="{{ url('products/orders')}}" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" ><i class="fas fa-arrow-alt-circle-left fa-sm text-white-50" style="font-size:24px" ></i>&nbsp; Back</a>
            &nbsp;&nbsp;<a href="{{ url('products/orders')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" style="font-size:24px "></i> &nbsp;Add</a> 
    
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">&nbsp; ORDER DETAIL&nbsp;</h6>
                                          
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ลำดับ</th>                           
                            <th style="text-align: center;">เลขที่บิล</th>
                            <th style="text-align: center;">ICODE</th> 
                            <th style="text-align: center;">รายการยา</th> 
                            <th style="text-align: center;">จำนวน</th> 
                            <th style="text-align: center;">หน่วย</th> 
                            <th style="text-align: center;">ราคา</th> 
                            <th style="text-align: center;">รวม</th>                                           
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($orderdetails as $orderdetail)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>   
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_ICODE}}</td>
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_NAME}}</td>
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_QTY}}</td>
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_UNITS}}</td>  
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_PRICE}}</td> 
                                    <td style="text-align: center;">{{ $orderdetail->ORDERDETAIL_PRO_TOTAL}}</td>                                
                                    <td style="text-align: center;">     
                                        <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-example-modal-xl{{ $orderdetail->ORDERDETAIL_ID}}"><i class="fas fa-fw fa-edit"></i></button> -->
                                        <a href="{{ url('products/destroy_updateorderdetail/destroy/'.$orderdetail->ORDERDETAIL_ID )}}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการที่จะลบ {{ $orderdetail->ORDERDETAIL_PRO_NAME}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            

                            <div class="modal fade bd-example-modal-xl{{ $orderdetail->ORDERDETAIL_ID}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                    <form action="{{ route('O.updateorderdetail')}}" method="POST" >
                                        @csrf
                                        <div class="modal-header">                 
                                            <h4 class="modal-title ">รายละเอียด Bill No.&nbsp;{{$orderdetail->ORDERDETAIL_BILLNO}}</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp; Edit </button>
                                        </div>
                                        <div class="card-body">                                   
                                        <input type="hidden" name="ORDERDETAIL_ID" id="ORDERDETAIL_ID" value="{{$orderdetail->ORDERDETAIL_ID}}">
                                        <input type="hidden" name="ORDER_ID" id="ORDER_ID[]" value="{{$orderdetail->ORDER_ID}}">
                                        <input type="hidden" name="ORDERDETAIL_BILLNO" id="ORDERDETAIL_BILLNO" value="{{$orderdetail->ORDERDETAIL_BILLNO}}"> 
                                        <input type="hidden" name="ORDERDETAIL_PRO_ICODE[]" id="ORDERDETAIL_PRO_ICODE[]" value="{{$orderdetail->ORDERDETAIL_PRO_ICODE}}">        
                                            <div class="row push">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4"></div>
                                            </div>
                                            </div>
                                            <div class="row push">
                                                <div class="col-md-1 text-right"><label for="">ชื่อยา</label></div>  
                                                <div class="col-md-3"> 
                                                    <select name="ORDERDETAIL_PRO_NAME" id="ORDERDETAIL_PRO_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                            <option value="">--กรุณาเลือกรายการยา--</option> 
                                                            @foreach ($Products as $Product)
                                                                @if($Product ->PRO_NAME == $orderdetail->ORDERDETAIL_PRO_NAME )
                                                                    <option value="{{ $Product -> PRO_ID }}" selected>{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>
                                                                @else
                                                                    <option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>
                                                                @endif
                                                            @endforeach                                                                                                                                                                    
                                                    </select>
                                                </div>
                                            <div class="col-md-0.5 text-right"><label for="">&nbsp; จำนวน &nbsp;</label></div>               
                                            <div class="col-md-2"> 
                                                <input value="{{$orderdetail->ORDERDETAIL_PRO_QTY}}" name="ORDERDETAIL_PRO_QTY" id="ORDERDETAIL_PRO_QTY" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                            </div>
                                            <div class="col-md-1 text-right"><label for="">หน่วย</label></div>               
                                            <div class="col-md-2">                                                 
                                                <select name="ORDERDETAIL_PRO_UNITS" id="ORDERDETAIL_PRO_UNITS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                                    <option value="">--เลือกหน่วยนับ--</option>
                                                        @foreach ($units as $unit)
                                                            @if($unit ->UNITS_NAME == $orderdetail->ORDERDETAIL_PRO_UNITS )
                                                                <option value="{{ $unit ->UNITS_ID }}"selected>{{ $unit-> UNITS_NAME}}</option>
                                                            @else
                                                                <option value="{{ $unit ->UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>
                                                            @endif
                                                        @endforeach
                                                </select>   
                                            </div>
                                            <div class="col-md-0.5 text-right"><label for="">&nbsp; ราคา &nbsp;</label></div>               
                                            <div class="col-md-1"> 
                                                <input value="{{$orderdetail->ORDERDETAIL_PRO_PRICE}}" name="ORDERDETAIL_PRO_PRICE" id="ORDERDETAIL_PRO_PRICE" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                            </div>
                                            <div class="col-md-0.5 text-right"><label for="">&nbsp; บาท&nbsp;</label></div>  
                                            </div>
                                            <br>
                                             
                                            <div class="modal-footer">
                    
                                            </div>  
                                        </div>                                           
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach                                                  
                    </tbody>
                </table>     
            </div>
             </form>
        </div>
    </div>
</div> 
</div>

<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{ route('O.saveordersdetail') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">ORDER DETAIL &nbsp;{{$orderdetail->ORDER_ID}}&nbsp;&nbsp;&nbsp;&nbsp;Bill No.&nbsp;{{$orderdetail->ORDERDETAIL_BILLNO}}</h4>                   
                    <button class="btn btn-sm btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp; Save </button>
                </div>
                <div class="modal-body"> 
                <input type="hidden" name="ORDER_ID" id="ORDER_ID" value="{{$orderdetail->ORDER_ID}}">
                <input type="hidden" name="ORDERDETAIL_BILLNO" id="ORDERDETAIL_BILLNO" value="{{$orderdetail->ORDERDETAIL_BILLNO}}">
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
                                                                        <td style="text-align: center;">รายการยา</td>                                                                      
                                                                        <td style="text-align: center;" width="10%">จำนวน</td>  
                                                                        <td style="text-align: center;" width="15%">หน่วย</td>    
                                                                        <td style="text-align: center;" width="15%">ราคา</td>                                                    
                                                                        <td style="text-align: center;" width="10%"><a  class="btn btn-success addRow1" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a></td>
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
                                                                                @foreach ($units as $unit)
                                                                                        <option value="{{ $unit -> UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>
                                                                                    @endforeach                                                                                                                                                                    
                                                                            </select> 
                                                                            </td>
                                                                            <td>
                                                                            <input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE[]" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                           
                                                                            </td>
                                                                            <td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>
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
                '@foreach ($units as $unit)'+
                '<option value="{{ $unit -> UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>'+
                '@endforeach '+                                                                                                                                                                   
                '</select>'+                                                                                         
                '</td>'+ 
                '<td>'+
                '<input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE[]" class="form-control input-lg" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+            
                '<td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove1', function(){
            $(this).parent().parent().remove(); 
                
     });

</script>

@endsection