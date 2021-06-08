@extends('layouts.admin')
@section('content')

<div class="container-fluid">
<div class="header">
    <div class="title">
    <h3>คิดค่าเช่าห้อง</h3>
    </div>
</div>
<form action="{{ route('Re.save') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
                                              
    <div class="card mb-3" style="max-width: 2350px;">
        <div class="row no-gutters">            
            <div class="col-md-12">
                <div class="card-body">   
                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">เลขที่บิล</label>
                                <input value="{{$refnumbers }}" type="text" class="form-control"  id="RENT_NO" name="RENT_NO" required>
                                <div class="valid-feedback">
                                เลขที่บิล! 
                                </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationServerPrice">วันที่บันทึก</label>                           
                            <input type="date" name ="RENT_DATE" id="RENT_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >                          
                    </div>
                    <div class="col-md-4 mb-3">
                   
                                     
                    @foreach ($pers as $per)
                        <input type="hidden" value="{{ $per ->PERSON_ID  }}" name ="RENT_PERSON_ID" id="RENT_PERSON_ID" class="form-control ">
                        <input type="hidden" value="{{ $per ->PERSON_ROOM_ID  }}" name ="PERSON_ROOM_ID" id="PERSON_ROOM_ID" class="form-control ">                       
                    @endforeach 

                   
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationServerPrice">ปี พศ.</label>                           
                            <input name ="RENT_YEAR" id="RENT_YEAR" class="form-control "  > 
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationServerPrice">ชำระก่อนวันที่</label>                           
                            <input type="date" name ="RENT_DUE_DATE" id="RENT_DUE_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >                          
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="row" > 
        <div class="col-12">                          
                <div class="card-body" style="width: 100%;margin:2px;2px;2px;2px;" >                           
                    <div class="block block-rounded block-bordered">
                        <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(18, 203, 254);">
                            <li class="nav-item">
                                <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการ</a>
                            </li> 
                             
                        </ul>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label> <div class="ml-auto" id="money"><b style="color:#ff6c00;font-size:30px;">0</b></div></label>  
                            <div class="block-content tab-content">
                                <div class="tab-pane active" id="object1" role="tabpanel">  
                                    <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center;" width="5%">ลำดับ</td>
                                                <td style="text-align: center;" width="30%">รายการ</td>
                                                <td style="text-align: center;" width="7%">มิเตอร์เก่า</td>   
                                                <td style="text-align: center;" width="7%">มิเตอร์ใหม่</td> 
                                                <td style="text-align: center;" width="7%">QTY</td> 
                                                <td style="text-align: center;" width="10%">ราคา</td>                                               
                                                <td style="text-align: center;" width="5%">
                                                <a class="btn btn-sm btn-success addRow1" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a></td>
                                            </tr>
                                        </thead> 
                                        <tbody class="tbody1"> 
                                                <tr>
                                                    <td style="text-align: center;"> 1 </td>
                                                    <td> 
                                                    <select name="RENT_DETAIL_LIST[]" id="RENT_DETAIL_LIST[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                        <option value="">--เลือก--</option> 
                                                        @foreach ($roomlists as $roomlist)                                            
                                                            <option value="{{ $roomlist ->LIST_ID }}">{{ $roomlist-> LIST_NAME}}</option>                                            
                                                        @endforeach                                                                                                                                                               -->
                                                    </select>
                                                    </td>   
                                                    <td>
                                                        <input name="RENT_DETAIL_METER_1[]" id="RENT_DETAIL_METER_1[]" class="form-control qty1" style=" font-family: 'Kanit', sans-serif;">
                                                    </td> 
                                                    <td>
                                                        <input name="RENT_DETAIL_METER_2[]" id="RENT_DETAIL_METER_2[]" class="form-control qty2" style=" font-family: 'Kanit', sans-serif;" onkeyup="callmoney()">
                                                    </td>
                                                    <td>
                                                        <input name="RENT_DETAIL_QTY[]" id="RENT_DETAIL_QTY[]" class="form-control input-sm totals" style=" font-family: 'Kanit', sans-serif;">
                                                    </td> 
                                                    <td>                                                       
                                                        <input name="RENT_DETAIL_PRICE[]" id="RENT_DETAIL_PRICE[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">
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
    <button class="btn btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;Save</button>
</form>
</div>


<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>

<script>
function callmoney(){    
    var qty2 = document.getElementsByClassName("qty2");
    var qty1 = document.getElementsByClassName("qty1");
    var qty2Count = qty2.length;
    var qty1Count = qty1.length;
    var total = 0;
    for(var i = 0; i < qty2Count; i++)
        for(var n = 0; n < qty1Count; n++)
            {
                total = parseInt(qty2[i].value) -  parseInt(qty1[n].value);
            } 
               
    document.getElementById("RENT_DETAIL_QTY").innerHTML = total;  
}


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
                '<select name="RENT_DETAIL_LIST[]" id="RENT_DETAIL_LIST[]" class="form-control" style=" font-family: \'Kanit\', sans-serif;">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($roomlists as $roomlist)'+                                            
                '<option value="{{ $roomlist ->LIST_ID }}">{{ $roomlist-> LIST_NAME}}</option> '+                                           
                '@endforeach ' +                                                                                                                                                                                  
                '</select>'+
                '</td>'+                
                '<td>'+
                '<input name="RENT_DETAIL_METER_1[]" id="RENT_DETAIL_METER_1[]" class="form-control qtys" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+ 
                '<td>'+
                '<input name="RENT_DETAIL_METER_2[]" id="RENT_DETAIL_METER_2[]" class="form-control items" style=" font-family: \'Kanit\', sans-serif;" onkeyup="callmoney()">'+
                '</td>'+
                '<td>'+
                '<input name="RENT_DETAIL_QTY[]" id="RENT_DETAIL_QTY[]" class="form-control input-sm totals" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+ 
                '<td>'+
                '<input name="RENT_DETAIL_PRICE[]" id="RENT_DETAIL_PRICE[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+               
                '<td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove1', function(){
            $(this).parent().parent().remove(); 
            callmoney();
     });



</script>
@endsection
