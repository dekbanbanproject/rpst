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
        <h1 class="h3 mb-0 text-gray-800">รับยาเข้าระบบ</h1>
        
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> Add</a> -->
            <a href="{{ url('products/receive_add')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" ><i class="fas fa-plus fa-sm text-white-50" ></i> Add</a>
    
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
                            <th style="text-align: center;">No-bill</th> 
                            <th style="text-align: center;">No.orders</th>
                            <th style="text-align: center;">วันที่สั่งซื้อ</th> 
                            <th style="text-align: center;">วันที่</th> 
                            <th style="text-align: center;">ตัวแทนจำหน่าย</th> 
                            <th style="text-align: center;">ผู้สั่ง</th>  
                            <th style="text-align: center;">Total Qty</th>   
                            <th style="text-align: center;">Total Price</th>                                                                                          
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($receives as $receive)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>                             
                                    <td style="text-align: center;">{{ $receive->RECEIVE_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $receive->RECEIVE_ORDER_BILLNO}}</td>
                                    <td style="text-align: center;">{{ $receive->RECEIVE_ORDER_DATE}}</td>
                                    <td style="text-align: center;">{{ $receive->RECEIVE_DATE}}</td>
                                    <td style="text-align: center;">{{ $receive->SUP_NAME}}</td>
                                    <td style="text-align: center;">{{ $receive->PERSON_FNAME}}&nbsp;&nbsp; {{ $receive-> PERSON_LNAME}}</td>
                                    <td style="text-align: center;">{{ $receive->RECEIVE_TOTAL_QTY}}</td>
                                    <td style="text-align: center;">{{number_format( $receive->RECEIVE_TOTAL_PRICE,2)}}</td> 
                                                                  
                                    <td style="text-align: center;">
                                        <!-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $receive->RECEIVE_ID}}"><i class="fas fa-qrcode"></i></button> -->
                                        <a href="{{ url('products/receive_view/'.$receive->RECEIVE_ID )}}" class="btn btn-sm btn-info" ><i class="fas fa-qrcode"></i></a>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $receive->RECEIVE_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#infoModal{{ $receive->RECEIVE_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/receive/destroy/'.$receive->RECEIVE_ID )}}" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการที่จะลบ No.bill &nbsp;เลขที่&nbsp;{{ $receive->RECEIVE_BILLNO}} หรือ No.orders &nbsp;เลขที่&nbsp;{{ $receive->RECEIVE_ORDER_BILLNO}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Add/.largeModal-->
<!-- <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myHugeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content"> -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">    
        <div class="modal-content ">
            <form action="{{ route('R.savereceive') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">RECEIVE</h4>                   
                    <button class="btn btn-sm btn-info" type="submit">Save </button>
                </div>
                <div class="modal-body">                   
                        <div class="row push">
                             <div class="col-md-1 text-right">
                                 No.bill
                            </div>                                                       
                            <div class="input-group col-3">
                                <input value="{{$refnumbers}}" name ="RECEIVE_BILLNO" id="RECEIVE_BILLNO" class="form-control" placeholder="เลขที่บิล" style=" font-family: 'Kanit', sans-serif;">
                                
                            </div>
                            <div class="col-md-1 text-right">
                                No.orders
                            </div>   
                            <div class="input-group col-3">
                                <input type="text" name ="RECEIVE_ORDER_BILLNO" id="RECEIVE_ORDER_BILLNO" class="form-control" placeholder="เลขที่ใบรับ" style=" font-family: 'Kanit', sans-serif;">
                            </div>         
                           
                            <div class="col-md-1 text-right">
                                &nbsp;Supplies &nbsp;
                            </div>                        
                            <div class="col-md-3 mr-auto">                               
                                <span>                            
                                    <select name="RECEIVE_SUP" id="RECEIVE_SUP" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                        <option value="">--เลือก--</option> 
                                        @foreach ($supps as $supp)
                                            <option value="{{ $supp -> SUP_ID  }}">{{ $supp-> SUP_NAME}}</option>
                                        @endforeach
                                    </select>                           
                                </span>  
                            </div> 
                        </div> 
                        <br>   
                        <div class="row push">
                            <div class="col-md-1 text-right">
                                วันที่สั่งซื้อ
                            </div> 
                            <div class="input-group col-3">
                                <input type="date" name ="RECEIVE_ORDER_DATE" id="RECEIVE_ORDER_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >
                            </div>
                            <div class="col-md-1 text-right">
                                วันที่รับ
                            </div>
                            <div class="input-group col-3">
                                <input type="date" name ="RECEIVE_DATE" id="RECEIVE_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >
                            </div>
                                       
                            <div class="col-md-1 text-right">
                               ผู้สั่ง
                            </div>                        
                            <div class="col-md-3 mr-auto">                                   
                                    <span>
                                        <select name="RECEIVE_STAFF" id="RECEIVE_STAFF" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                            <option value="">--เลือก--</option> 
                                            @foreach ($Persons as $Person)
                                                <option value="{{ $Person -> PERSON_ID }}">{{ $Person-> PERSON_FNAME}}&nbsp;&nbsp;{{ $Person-> PERSON_LNAME}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                            </div> 
                        </div> 
                <hr> 
                <!-- <div class="container-fuid" > -->
                    <div class="row" > 
                        <div class="col-12">                          
                                <div class="card-body" style="width: 100%;margin:2px;2px;2px;2px;" >                           
                                            <div class="block block-rounded block-bordered">
                                                <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(255,12,93);">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการสินค้า</a>
                                                    </li>  
                                                </ul>
                                                    <div class="block-content tab-content">
                                                    <div class="tab-pane active" id="object1" role="tabpanel">  
                                                            <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <td style="text-align: center;" width="5%">ลำดับ</td>
                                                                        <td style="text-align: center;" width="30%">รายการยา</td>                                                                      
                                                                        <td style="text-align: center;" width="9%">จำนวน</td>
                                                                        <td style="text-align: center;" width="15%">หน่วย</td> 
                                                                        <td style="text-align: center;" width="7%">ราคา/บาท</td> 
                                                                        <td style="text-align: center;" width="15%">Lot.</td> 
                                                                        <td style="text-align: center;" width="7%">STP.</td> 
                                                                        <td style="text-align: center;" width="7%">EXP.</td> 
                                                                        <td style="text-align: center;" width="5%"><a  class="btn btn-sm btn-success addRow1" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a></td>
                                                                    </tr>
                                                                </thead> 
                                                                <tbody class="tbody1"> 
                                                                        <tr>
                                                                            <td style="text-align: center;"> 1 </td>
                                                                            <td> 
                                                                                <select name="RECEIVE_PRO_NAME[]" id="RECEIVE_PRO_NAME[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                                                    <option value="">--เลือก--</option> 
                                                                                    @foreach ($Products as $Product)
                                                                                        <option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>
                                                                                    @endforeach                                                                                                                                                                    
                                                                                </select>
                                                                            </td>                                                                               
                                                                            <td>
                                                                             <input name="RECEIVE_PRO_QTY[]" id="RECEIVE_PRO_QTY[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                                            </td>
                                                                            <td>
                                                                            <select name="RECEIVE_PRO_UNIT[]" id="RECEIVE_PRO_UNIT[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                                                    <option value="">--เลือก--</option> 
                                                                                    @foreach ($Unis as $Uni)
                                                                                        <option value="{{ $Uni -> UNITS_ID }}">{{ $Uni-> UNITS_NAME}}</option>
                                                                                    @endforeach                                                                                                                                                                    
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                             <input name="RECEIVE_PRO_PRICE[]" id="RECEIVE_PRO_PRICE[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                                            </td>
                                                                            <td>
                                                                             <input name="RECEIVE_PRO_LOT[]" id="RECEIVE_PRO_LOT[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                                            </td>
                                                                            <td>                                                                         
                                                                            <input type="date" name ="RECEIVE_PRO_STP[]" id="RECEIVE_PRO_STP[]" class="form-control datepicker" data-date-format="mm/dd/yyyy" >
                                                                            </td>
                                                                            <td>                                                                         
                                                                            <input type="date" name ="RECEIVE_PRO_EXP[]" id="RECEIVE_PRO_EXP[]" class="form-control  datepicker" data-date-format="mm/dd/yyyy" >
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
                            
            </form>                                    
               
                <div class="modal-footer">
                  
                </div>
            </div>
         
      </div>
  </div>
</div>
<!-- </div> -->

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
                '<select name="RECEIVE_PRO_NAME[]" id="RECEIVE_PRO_NAME[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '<option value="">--กรุณาเลือก--</option> '+
                '@foreach ($Products as $Product)'+
                '<option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_CODE}}&nbsp;&nbsp;{{ $Product-> PRO_NAME}}</option>'+
                '@endforeach'+                                                                                                                                                                    
                '</select>'+
                '</td>'+
                '<td>'+
                '<input name="RECEIVE_PRO_QTY[]" id="RECEIVE_PRO_QTY[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+
                '<td>'+
                '<select name="RECEIVE_PRO_UNIT[]" id="RECEIVE_PRO_UNIT[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '<option value="">--กรุณาเลือก--</option> '+
                '@foreach ($Unis as $Uni)'+
                '<option value="{{ $Uni -> UNITS_ID }}">{{ $Uni-> UNITS_NAME}}</option>'+
                '@endforeach '+                                                                                                                                                                  
                '</select>'+
                '</td>'+
                '<td>'+
                '<input name="RECEIVE_PRO_PRICE[]" id="RECEIVE_PRO_PRICE[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+
                '<td>'+
                '<input name="RECEIVE_PRO_LOT[]" id="RECEIVE_PRO_LOT[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+  
                '<td> '+                                                                        
                '<input type="date" name ="RECEIVE_PRO_STP[]" id="RECEIVE_PRO_STP[]" class="form-control" class="form-control input-sm datepicker" data-date-format="mm/dd/yyyy" >'+
                '</td>'+
                '<td> '+                                                                        
                '<input type="date" name ="RECEIVE_PRO_EXP[]" id="RECEIVE_PRO_EXP[]" class="form-control" class="form-control input-sm datepicker" data-date-format="mm/dd/yyyy" >'+
                '</td>' +            
                '<td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove1', function(){
            $(this).parent().parent().remove(); 
                
     });

</script>
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
 function checksummoney(number){
          
          var RECEIVE_TOTAL_QTY=document.getElementById("RECEIVE_PRO_QTY"+number).value;
          var RECEIVE_TOTAL_PRICE=document.getElementById("RECEIVE_PRO_PRICE"+number).value;
          
          var _token=$('input[name="_token"]').val();
               $.ajax({
                       url:"{{route('O.checksummoney')}}",
                       method:"GET",
                       data:{RECEIVE_TOTAL_QTY:RECEIVE_TOTAL_QTY,RECEIVE_TOTAL_PRICE:RECEIVE_TOTAL_PRICE,_token:_token},
                       success:function(result){
                          $('.summoney'+number).html(result);
                          findTotal();
                       }
               })
               
      }
      function findTotal(){
        var arr = document.getElementsByName('sum');
        var tot=0;
    
        count = $('.tbody1').children('tr').length;
        for(var i=0;i<count;i++){
                tot += parseFloat(arr[i].value);
        }
        document.getElementById('total').value =tot.toFixed(5);
    }

</script>

@endsection