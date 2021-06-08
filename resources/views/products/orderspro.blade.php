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

<div class="container-fluid" onload="run01();">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ทำรายการสั่งซื้อ</h1>
        <form action="{{ route('O.save') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <button type="submit" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm" ><i class='fas fa-save' style='font-size:24px;color:red text-white-50' ></i>&nbsp; Save</button>
            <!-- <a href="{{ url('products/orderspro')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" ><i class="fas fa-plus fa-sm text-white-50" ></i> Add</a> -->
    
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการยา</h6>                                 
        </div>   
                <div class="card-body">            
                        <div class="row push">
                            <div class="col-md-0.5">
                                &nbsp;&nbsp; วันที่ &nbsp;
                            </div>
                            <div class="col-md-2">                            
                               
                                <input type="date" name = "ORDER_DATE"  id="ORDER_DATE"  class="form-control input-lg datepicker" data-date-format="mm/dd/yyyy" >                         
                            </div>
                            <div class="col-md-0.5">
                                &nbsp;เลขที่บิล &nbsp;
                            </div>
                            <div class="col-md-2">                            
                                <input name ="ORDER_BILLNO" id="ORDER_BILLNO" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                            </div>  
                            <div class="col-md-0.5">
                                &nbsp;ตัวแทนจำหน่าย &nbsp;
                            </div>                            
                            <div class="col-md-3">
                                <span>                            
                                    <select name="ORDER_SUP" id="ORDER_SUP" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                        <option value="">--ทั้งหมด--</option> 
                                        @foreach ($supps as $supp)
                                            <option value="{{ $supp -> SUP_ID  }}">{{ $supp-> SUP_NAME}}</option>
                                        @endforeach
                                    </select>                           
                                </span>
                            </div> 
                            <div class="detail">
                            <input type="hidden" name="HIRE_DETAIL" id="HIRE_DETAIL" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;" value="">
                            </div> 
                            <div class="col-md-0.5">
                                &nbsp;ผู้สั่ง &nbsp;
                            </div>                        
                            <div class="col-md-2">
                                <span>
                                    <select name="ORDER_STAFF" id="ORDER_STAFF" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                        <option value="">--ทั้งหมด--</option> 
                                        @foreach ($Persons as $Person)
                                            <option value="{{ $Person -> PERSON_ID }}">{{ $Person-> PERSON_FNAME}}&nbsp;&nbsp;{{ $Person-> PERSON_LNAME}}</option>
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
                                                <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(228, 168, 225);">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการสินค้า</a>
                                                    </li>  
                                                </ul>
                                            <div class="block-content tab-content">
                                            <br>
                                                <div class="col-sm-12 row"  align="right">
                                                    <div class="col-sm-7"></div> <div class="col-sm-1"><label>รวมมูลค่า </div><div class="col-sm-3"><input class="form-control input-sm " style="text-align: center;background-color: #E0FFFF;font-size: 13px;" type="text" name="total" id="total" readonly></div><div class="col-sm-1"><label>  บาท</label></div>
                                                    </div>
                                                <br>
                                                        <div class="tab-pane active" id="object1" role="tabpanel"> 
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td style="text-align: center;" width="5%">ลำดับ</td>
                                                                        <td style="text-align: center;" width="20%">รายการสินค้า</td>
                                                                        <td style="text-align: center;" width="25%">Code สินค้า</td>                                                                    
                                                                        <td style="text-align: center;" width="10%">จำนวน</td>  
                                                                        <td style="text-align: center;"width="12%">ราคา</td> 
                                                                        <td style="text-align: center;">จำนวนเงิน</td>                                                                   
                                                                        <td style="text-align: center;" width="7%">
                                                                        <a class="btn btn-success addRow" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </thead> 
                                                                <tbody class="tbody1"> 
                                                                    <tr>
                                                                        <td style="text-align: center;"> 1 </td>
                                                                        <td>                                                                            
                                                                             <select name="ORDERDETAIL_PRO_NAME[]" id="ORDERDETAIL_PRO_NAME0" class="form-control input-lg type_sub" style=" font-family: 'Kanit', sans-serif;" onchange="checkproduct(0);">
                                                                                <option value="">--กรุณาเลือกรายการสินค้า--</option> 
                                                                                    @foreach ($Products as $Product)
                                                                                        <option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_NAME}}</option>
                                                                                    @endforeach 
                                                                            </select>                                                                           
                                                                        </td> 
                                                                        <div class="detail">
                                                                            <input type="hidden" name="HIRE_DETAIL" id="HIRE_DETAIL" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;" value="">
                                                                        </div> 
                                                                        <td> 
                                                                            <div class="showcode0"></div> 
                                                                        </td>                                                                                                                                                 
                                                                        <td>                                                                          
                                                                            <input name="ORDERDETAIL_PRO_QTY[]" id="ORDERDETAIL_PRO_QTY0" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;" onkeyup="checksummoney(0)" OnKeyPress="return chkNumber(this)">
                                                                        </td>
                                                                        <td>                                                                         
                                                                            <input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE0" class="form-control input-lg " style=" font-family: 'Kanit', sans-serif;" onkeyup="checksummoney(0)" OnKeyPress="return chkNumber(this)">
                                                                        </td>                                                                       
                                                                        <td>
                                                                            <div class="summoney0" ></div> 
                                                                        </td>
                                                                        <td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>
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
               
                <div class="footer">
                  
                </div>
            </div>
         
      </div>
  </div>

</div>

<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>
<script>
function run01(){
    var count = $('.tbody1').children('tr').length;
    var number;
        for (number = 0; number < count; number++) { 
            checkproduct(number);         
        }
        
}
function checkproduct(number){      
    
      var PRO_ID=document.getElementById("ORDERDETAIL_PRO_NAME"+number).value;
      var _token=$('input[name="_token"]').val();
           $.ajax({
                   url:"{{route('O.checkproduct')}}",
                   method:"GET",
                   data:{PRO_ID:PRO_ID,_token:_token},
                   success:function(result){
                      $('.showcode'+number).html(result);
                   }
           })
}
$('.type_sub').change(function(){
             if($(this).val()!=''){
             var select=$(this).val();
             var _token=$('input[name="_token"]').val();
             $.ajax({
                     url:"{{route('O.fetchdetail')}}",
                     method:"GET",
                     data:{select:select,_token:_token},
                     success:function(result){
                        $('.detail').html(result);
                     }
             })
            // console.log(select);
             }        
     });
</script>
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
                '<select name="ORDERDETAIL_PRO_NAME[]" id="ORDERDETAIL_PRO_NAME'+count+'" class="form-control input-lg" onchange="checkproduct('+count+');">'+              
                '<option value="">--กรุณาเลือกรายการสินค้า--</option>'+ 
                '@foreach ($Products as $Product)'+
                '<option value="{{ $Product -> PRO_ID }}">{{ $Product-> PRO_NAME}}</option>'+
                '@endforeach'+
                '</select> '+
                '</td>'+ 
                '<td><div class="showcode'+count+'"></div></td>'+
                '<td>'+
                '<input name="ORDERDETAIL_PRO_QTY[]" id="ORDERDETAIL_PRO_QTY'+count+'" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;" onkeyup="checksummoney('+count+');" OnKeyPress="return chkNumber(this)">'+
                '</td>'+               
                '<td>'+
                '<input name="ORDERDETAIL_PRO_PRICE[]" id="ORDERDETAIL_PRO_PRICE'+count+'" class="form-control input-sm " style=" font-family: \'Kanit\', sans-serif;" onkeyup="checksummoney('+count+');" OnKeyPress="return chkNumber(this)">'+
                '</td>'+
                '<td>'+
                '<div class="summoney'+count+'"></div>'+
                '</td>'+
                '<td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove', function(){
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
          
          var ORDERDETAIL_PRO_QTY=document.getElementById("ORDERDETAIL_PRO_QTY"+number).value;
          var ORDERDETAIL_PRO_PRICE=document.getElementById("ORDERDETAIL_PRO_PRICE"+number).value;
          
          var _token=$('input[name="_token"]').val();
               $.ajax({
                       url:"{{route('O.checksummoney')}}",
                       method:"GET",
                       data:{ORDERDETAIL_PRO_QTY:ORDERDETAIL_PRO_QTY,ORDERDETAIL_PRO_PRICE:ORDERDETAIL_PRO_PRICE,_token:_token},
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