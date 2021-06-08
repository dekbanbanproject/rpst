@extends('layouts.adminlte')
@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}'; 
    }
</script>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายการยา</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">เบิก-จ่ายรายการยา</li>
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
      /* width:1350px; */
      /* align-items: center; */
            /* display: flex; */
            /* justify-content: center; */
      /* text-align: center; */
  }  
</style>
<?php

if(Auth::check()){
    $status = Auth::user()->status;
    $id_user = Auth::user()->name;   
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
<section class="col-md-12">
    <div class="card shadow mb-4 ">
        <div class="card-header shadow lg">
            <h6 class="float-sm-left  font-weight-bold text-primary">เบิก-จ่ายรายการยา</h6>         
            <a href="{{ route('setting.pay_drug') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a> 
        </div>
       
        <div class="card-body shadow lg">        
            <form action="{{ route('setting.pay_drug_save')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                
                    <div class="form-row">
                        <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_DATE">วันเบิก-จ่าย :</label>  
                            <input type="date" name ="PAY_DATE" id="PAY_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >                                                       
                        </div>     
                        <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_BILLNO">เลขที่บิล :</label>  
                            <input value="{{ $refnumbers }}" name ="PAY_BILLNO" id="PAY_BILLNO" class="form-control"  >                                                       
                        </div> 
                        <!-- <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_STORE">Store :</label>  
                            <select name="PAY_STORE" id="PAY_STORE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >                                                                                             
                                <option value="">--เลือก--</option> 
                                @foreach ($locates as $locate)                                            
                                    <option value="{{ $locate ->LOCATE_ID }}" >{{ $locate-> LOCATE_NAME}}</option>                                           
                                @endforeach 
                            </select>                                                         
                        </div>   -->

                        <div class="col-md-2 mb-2 text-left">
                            <label for="PAY_YEAR">ปีงบประมาณ :</label>  
                            <select name="PAY_YEAR" id="PAY_YEAR" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >                                                                                             
                                        <option value="">--เลือก--</option> 
                                        @foreach ($years as $year)                                            
                                            <option value="{{ $year ->YEAR_ID }}" >{{ $year-> YEAR_NAME}}</option>                                           
                                        @endforeach 
                                    </select>                                                        
                        </div> 
                        <div class="col-md-3 mb-3 text-left">
                            <label for="PAY_BILL_ORDERS">เลขที่สั่งซื้อ :</label>  
                            <input  name ="PAY_BILL_ORDERS" id="PAY_BILL_ORDERS" class="form-control"  >                                
                        </div>  


                        <div class="col-md-3 mb-3 text-left">
                            <label for="PAY_STAFF">ผู้จ่าย :</label>                             
                            <input value="{{$id_user}} " name ="PAY_STAFF" id="PAY_STAFF" class="form-control"  readonly>                                                 
                        </div> 
                        </div> 
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="object1" role="tabpanel">  
                                <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                
                                <thead style="background-color: #FFEBCD;">
                                     
                                            <tr>
                                            <td style="text-align: center; font-size: 13px;">ลำดับ</td>
                                                <td style="text-align: center; font-size: 13px;" width="20%">รายการรับเข้า</td>
                                                <td style="text-align: center; font-size: 13px;" >LOT</td>
                                                <td style="text-align: center; font-size: 13px;" >ล็อตผลิต</td>
                                                <td style="text-align: center; font-size: 13px;" >คงเหลือ</td>
                                                <td style="text-align: center; font-size: 13px;" width="5%">หน่วย</td>
                                                
                                                <td style="text-align: center; font-size: 13px;" width="8%">จำนวนจ่าย</td>
                                                <td style="text-align: center; font-size: 13px;" >ราคาต่อหน่วย</td>
                                                <td style="text-align: center; font-size: 13px;" width="10%" >มูลค่า</td>
                                                
                                                <td style="text-align: center; font-size: 13px;" >วันที่ผลิต</td>
                                                <td style="text-align: center; font-size: 13px;" >วันที่หมดอายุ</td>
                                                <td style="text-align: center; font-size: 13px;" width="5%"><a  class="btn btn-success fa fa-plus addRow" style="color:#FFFFFF;"></a></td>
                                            </tr>
                                        </thead> 
                                        <tbody class="tbody1"> 
                                        

                                      
                                    <tr style="text-align: center; font-size: 13px;">
                                        <td style="text-align: center; font-size: 13px;">
                                             1
                                        </td>
                                        <td style="text-align: left;" class="infosupselect0 text-pedding">
                                       
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".addsup" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-weight:normal;"  onclick="detailsup(0);" >LOT</button>
                                        </td>
              
                                        <td  class="infosupselectlot0">
                                      
                                        </td>
                                        <td class="infosupselecttotal0">
                                      
                                      </td>
                                    
                                      <td class="infosupselectunit0">

                                       </td>
                               
                                       <td >
                                       <input style="text-align: center; " name="TREASURY_EXPORT_SUB_AMOUNT[]" id="RECEIVE_SUB_AMOUNT0" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"  onkeyup="checksummoney(0),checktotal(0)">
                                       </td>
                                       <td class="infosupselectpiceunit0">
                                    
                                       </td>
                                       <td style="text-align: center; font-size: 13px;">
                                       <div class="summoney0"></div> 
                                       </td>

                                       <td class="infosupselectdatget0">
                                    
                                       </td>
                                       <td class="infosupselectdatexp0">
                                      
                                       </td>
                                   
                                       <td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>
                                   </tr>
                             
                                    </tbody>   
                                    </table>





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
</section>

<!--    เมนูเลือก   -->
       
<div class="modal fade addsup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modeladdsup">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">          
                            <h2 class="modal-title" style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.5rem;font-weight:normal;">เลือกพัสดุที่ต้องการจ่าย</h2>
                        </div>
                    <div class="modal-body">
                <body>
                    <div class="container mt-3">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                        <div style='overflow:scroll; height:300px;'>
                
                        <div id="detailsup"></div>

                    </div>
                </div>
                </div>
                    <div class="modal-footer">
                        <div align="right">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;">ปิดหน้าต่าง</button>
                        </div>
                    </div>
                </body>
            </div>
          </div>
        </div>





<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
<script>


$('.addRow').on('click',function(){
        addRow();
        var count = $('.tbody1').children('tr').length;
        var number =  (count).valueOf();
        datepicker(number);
    });

   


    function addRow(){
    var count = $('.tbody1').children('tr').length;
    var number =  (count + 1).valueOf();

    
        var tr =   '<tr style="text-align: center; font-size: 13px;">'+
                '<td style="text-align: center;">'+
                +number+
                '</td>'+
                '<td style="text-align: left;" class="infosupselect'+count+' text-pedding">'+            
                '</td>'+
                '<td>'+
                '<button type="button" class="btn btn-info" data-toggle="modal" data-target=".addsup" style="font-family: \'Kanit\', sans-serif; font-size: 10px;font-weight:normal;"  onclick="detailsup('+count+');" >LOT</button>'+
                '</td>'+
                '<td class="infosupselectlot'+count+'">'+
                '</td>'+
                '<td class="infosupselecttotal'+count+'">'+  
                '</td>'+                  
                '<td class="infosupselectunit'+count+'">'+
                '</td>'+
                '<td >'+
                '<input style="text-align: center; " name="TREASURY_EXPORT_SUB_AMOUNT[]" id="RECEIVE_SUB_AMOUNT'+count+'" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;"  onkeyup="checksummoney('+count+'),checktotal('+count+')">'+
                '</td>'+
                '<td class="infosupselectpiceunit'+count+'">'+
                '</td>'+
                '<td style="text-align: center; font-size: 13px;">'+
                '<div class="summoney'+count+'"></div>'+ 
                '</td>'+
                '<td class="infosupselectdatget'+count+'">'+
                '</td>'+
                '<td class="infosupselectdatexp'+count+'">'+
                '</td>'+
                '<td style="text-align: center;"><a class="btn btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
                                  
    $('.tbody1').append(tr);
    };

    $('.tbody1').on('click','.remove', function(){
        $(this).parent().parent().remove();
});




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

function detail(id){

$.ajax({
            url:"",
          method:"GET",
           data:{id:id},
           success:function(result){
               $('#detail').html(result);

           }

   })

}


   $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            }).datepicker();  //กำหนดเป็นวันปัจุบัน
    });

 //------------------------------------------function-----------------

 function detailsup(iddep,count){
$.ajax({
            url:"setting.detailsup",
          method:"GET",
           data:{iddep:iddep,count:count},
           success:function(result){
               $('#detailsup').html(result);
           }
   })   

}
function selectsup(idsup,count){
var _token=$('input[name="_token"]').val();
        $.ajax({
                url:"{{route('setting.selectsup')}}",
               method:"GET",
               data:{idsup:idsup,_token:_token},
               success:function(result){
                $('.infosupselect'+count).html(result);
               }
       })
       $.ajax({
                url:"{{route('setting.selectsuplot')}}",
                   method:"GET",
                   data:{idsup:idsup,_token:_token},
                   success:function(result){
                    $('.infosupselectlot'+count).html(result);
                   }
           })

           $.ajax({
                    url:"{{route('setting.selectsuptotal')}}",
                   method:"GET",
                   data:{idsup:idsup,count:count,_token:_token},
                   success:function(result){
                    $('.infosupselecttotal'+count).html(result);
                   }
           })

           $.ajax({
                    url:"{{route('setting.selectsupunit')}}",
                   method:"GET",
                   data:{idsup:idsup,_token:_token},
                   success:function(result){
                    $('.infosupselectunit'+count).html(result);
                   }
           })

           $.ajax({
                    url:"{{route('setting.selectsuppiceunit')}}",
                   method:"GET",
                   data:{idsup:idsup,count:count,_token:_token},
                   success:function(result){
                    $('.infosupselectpiceunit'+count).html(result);
                   }
           })

           $.ajax({
                    url:"{{route('setting.selectsupdatget')}}",
                   method:"GET",
                   data:{idsup:idsup,_token:_token},
                   success:function(result){
                    $('.infosupselectdatget'+count).html(result);
                   }
           })


           $.ajax({
                   url:"{{route('setting.selectsupdatexp')}}",
                   method:"GET",
                   data:{idsup:idsup,_token:_token},
                   success:function(result){
                    $('.infosupselectdatexp'+count).html(result);
                   }
           })
        
       $('#modeladdsup').modal('hide');

}
//-----------------------------------------------------

function checksummoney(number){      
    
      var SUP_TOTAL=document.getElementById("RECEIVE_SUB_AMOUNT"+number).value;
      var PRICE_PER_UNIT=document.getElementById("RECEIVE_SUB_PICE_UNIT"+number).value;
     
      var _token=$('input[name="_token"]').val();
           $.ajax({
                   url:"",
                   method:"GET",
                   data:{SUP_TOTAL:SUP_TOTAL,PRICE_PER_UNIT:PRICE_PER_UNIT,_token:_token},
                   success:function(result){
                      $('.summoney'+number).html(result);
                      findTotal();
                   }
           })                      
  }

  function checktotal(number){      
    
      var SUP_TOTAL= Number(document.getElementById("RECEIVE_SUB_AMOUNT"+number).value);
      var TREASURY_EXPORT_SUB_VALUE= Number(document.getElementById("TREASURY_EXPORT_SUB_VALUE"+number).value);
      
      if(TREASURY_EXPORT_SUB_VALUE < SUP_TOTAL){
        alert("ของในคลังมีไม่เพียงพอในการจ่าย !!");
        document.getElementById('RECEIVE_SUB_AMOUNT'+number).value = TREASURY_EXPORT_SUB_VALUE;
      }
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
