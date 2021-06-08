@extends('layouts.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ทำรายการรักษา</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ทำรายการรักษา</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
<div class="container-fluid">
<div class="row">
<section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">ทำรายการรักษา</h5>         
            <a href="{{ url('Mainpage/clinic_per') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>                               
        </div>

        <form action="{{ route('Clinic.sym_save' )  }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
                <div class="card-body shadow lg">
                    <div class="form-row">
                        <div class="col-md-3 mb-3 text-left">
                            <label for="validationServer01">วันที่</label>  
                            <input type="date" name ="SYM_DATE" id="SYM_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" >                                                       
                        </div>    
                        <div class="col-md-3 mb-3 text-left">
                            <label for="validationServer01">เวลา</label>  
                            <input type="time" name ="SYM_TIME" id="SYM_TIME" class="form-control time"  >                                                       
                        </div>                                                  
                        <div class="col-md-6 mb-6 text-left">
                            <label for="validationServer01">ชื่อ-นามสกุล</label>                                    
                                <select name="PER_ID" id="PER_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >                                                                                             
                                        <option value="{{ $pers ->PER_ID }}" selected>{{ $pers-> PER_FNAME}}&nbsp; {{ $pers-> PER_LNAME}}</option> 
                                </select> 
                        </div>
                        <div class="col-md-2 mb-3">
                        
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="col-md-2 mb-2 text-left">
                            <label for="CHECK_WEIGHT">น้ำหนัก / Kg.</label> 
                            <input name ="CHECK_WEIGHT" id="CHECK_WEIGHT" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกน้ำหนัก !!
                                </div>
                        </div>
                        <div class="col-md-2 mb-2 text-left">
                            <label for="CHECK_HIGHT">ส่วนสูง / Cm.</label> 
                            <input name ="CHECK_HIGHT" id="CHECK_HIGHT" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกส่วนสูง !!
                                </div>
                        </div>                        
                        
                        <div class="col-md-2 mb-2 text-left">
                            <label for="CHECK_HT">ความดันโลหิต /</label>
                            <input name ="CHECK_HT" id="CHECK_HT" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกความดัน !!
                                </div>
                        </div>
                        
                        <div class="col-md-3 mb-3 text-left">   
                        <label for="CHECK_BP">BP</label>
                        <input name ="CHECK_BP" id="CHECK_BP" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกBP !!
                                </div>
                        </div>
                        <div class="col-md-3 mb-3 text-left">
                            <label for="CHECK_TEMP">อุณหภูมิ</label>
                            <input name ="CHECK_TEMP" id="CHECK_TEMP" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกอุณหภูมิ !!
                                </div>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6 mb-6 text-left">
                            <label for="SYM_DRUG_ALLERGY">แพ้ยา</label> 
                            <input name ="SYM_DRUG_ALLERGY" id="SYM_DRUG_ALLERGY" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกแพ้ยา !!
                                </div>
                        </div>            
                                    
                        <div class="col-md-6 mb-6 text-left">
                            <label for="SYM_ROKE">โรคประจำตัว</label>
                            <input name ="SYM_ROKE" id="SYM_ROKE" class="form-control input-sm fix-rounded-right" required>
                                <div class="invalid-feedback">
                                        กรุณากรอกโรคประจำตัว !!
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6 mb-6 text-left">
                            <label for="SYM_AKAN">อาการ</label> 
                            <textarea name="SYM_AKAN" id="SYM_AKAN" rows="3" class="form-control input-sm " required></textarea>
                        </div> 
                        <div class="col-md-6 mb-6 text-left">
                            <label for="SYM_DIAG">Diag</label> 
                            <textarea name="SYM_DIAG" id="SYM_DIAG" rows="3" class="form-control input-sm " required></textarea>
                        </div> 
                    </div>
                    </div> 
                    <div class="form-row"> 
                        <div class="col-md-12 mb-12">                       
                            <div class="card-body" style="width: 100%;margin:2px;2px;2px;2px;" >                           
                                <div class="block block-rounded block-bordered">
                                    <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(184, 234, 255);">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการยา</a>
                                        </li>                                 
                                    </ul> 
                                   
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="object1" role="tabpanel">  
                                <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                
                                    <thead>
                                        <tr>
                                            <td style="text-align: center;color:#7B0099" width="5%">ลำดับ</td>
                                            <td style="text-align: center;color:#7B0099" >รายการ</td>
                                            <td style="text-align: center;color:#7B0099" width="12%">หน่วยนับ</td> 
                                            <td style="text-align: center;color:#7B0099" width="15%">จำนวน</td> 
                                            <td style="text-align: center;color:#7B0099" width="20%">ราคา</td>                                               
                                            <td style="text-align: center;color:#7B0099" width="5%">
                                                <a class="btn btn-sm btn-success addRow" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a>
                                            </td>
                                        </tr>
                                    </thead> 
                                    <tbody class="tbody1"> 
                                        <tr>
                                            <td style="text-align: center;"> 1 </td>
                                            <td> 
                                            <select name="SYM_DETAIL_DRUGID[]" id="SYM_DETAIL_DRUGID[]" class="form-control" >
                                                    <option value="">--เลือก--</option> 
                                                    @foreach ($drugs as $drug)                                            
                                                        <option value="{{ $drug ->DRUG_ID }}">{{ $drug-> DRUG_NAME}}</option>                                           
                                                    @endforeach                                                                                                                                                 -->
                                                </select>
                                            </td>                                                     
                                            <td>
                                            <select name="SYM_DETAIL_DRUGUNIT[]" id="SYM_DETAIL_DRUGUNIT[]" class="form-control" >
                                                <option value="">--เลือก--</option> 
                                                    @foreach ($units as $unit)                                            
                                                        <option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option>                                           
                                                    @endforeach                                                                                                                                                 -->
                                            </select>
                                                
                                            </td> 
                                            <td>
                                                <input name="SYM_DETAIL_DRUGQTY[]" id="SYM_DETAIL_DRUGQTY[]" class="form-control">
                                            </td>  
                                            <td>                                                       
                                                <input name="SYM_DETAIL_DRUGPRICE[]" id="SYM_DETAIL_DRUGPRICE[]" class="form-control input-sm" >
                                            </td>                                                                                                       
                                            <td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>
                                        </tr>                                                                 
                                    </tbody>   
                                </table>
                            </div>
                        </div>                                                                                               
                    </div>                             
                               
                     
                <div class="modal-footer shadow lg">                
                        <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>               
                </div>
           </div>  
        </div> 
    
        </form>

</section>

        <section class="col-md-12">
            <div class="card shadow lg">
                <div class="card-header shadow lg">
                    <div class="form-row">
                            <div class="col-md-2 mb-2">                      
                                <h5>ดูรายการประวัติผู้ป่วย</h5>
                            </div> 
                            <div class="col-md-8 mb-8">                      
                                <span><input type="search"  name="search" class="form-control " value="{{$search}}"></span>
                            </div> 
                            <div class="col-md-2 mb-2"> 
                                <button class="btn btn-sm btn-warning text-white" type="submit" style="font-size:17px "><i class="fa fa-search fa-sm text-white" style="font-size:15px "></i>&nbsp;&nbsp;ค้นหา </button>                                                 
                            </div> 
                        </div>
                </div>
                <div class="card-body shadow lg"> 
               
                <table class="table table-hover" id="example1" width="100%" >
                        <thead>
                            <tr>
                                <th style="text-align: center;color:#7B0099"width="3%">ลำดับ</th>                                 
                                <th style="text-align: center;color:#7B0099" width="10%">วันที่</th>  
                                <th style="text-align: center;color:#7B0099" width="7%">เวลา</th>  
                                <th style="text-align: center;color:#7B0099">ชื่อ-นามสกุล</th>  
                                <th style="text-align: center;color:#7B0099" width="10%">CID</th> 
                                <th style="text-align: center;color:#7B0099"width="10%">เบอร์โทร</th> 
                                <th style="text-align: center;color:#7B0099" width="12%">จัดการ</th>                                                  
                            </tr>
                        </thead>              
                        <tbody>
                        <?php $number = 0; ?>
                            @foreach ($sympers as $symper)
                                <?php $number++;  ?>
                                    <tr>                                    
                                        <td style="text-align: center;">{{ $number}}</td> 
                                        <td style="text-align: center;">{{DateThai($symper->SYM_DATE) }} </td> 
                                        <td style="text-align: center;">{{ $symper->SYM_TIME}} </td> 
                                        <td style="text-align: center;">{{ $symper->PER_FNAME}}&nbsp;{{ $symper->PER_LNAME}}</td>                                 
                                        <td style="text-align: center;">{{ $symper->PER_CID}}</td>                                        
                                        <td style="text-align: center;">{{ $symper->PER_TEL}}</td>   
                                        <td style="text-align: center;">
                                        <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal{{$symper->PER_ID}}"><i class="fas fa-history text-white-70" style="font-size:18px;"></i>&nbsp;&nbsp;&nbsp;ดูประวัติ</a>
                                        </td> 
                                       
                                    </tr>  

                                     <!-- view/.largeModal-->
        <div class="modal fade" id="AddModal{{$symper->PER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">           
                        <div class="modal-header shadow lg">                
                            <h4 style="color:#7CBB00">ประวัติคุณ&nbsp;&nbsp;{{ $symper->PER_FNAME}}&nbsp;{{ $symper->PER_LNAME}}</h4>
                        </div>
                        <div class="modal-body shadow lg"> 
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>วันที่ :</b></label> &nbsp; {{ DateThai($symper->SYM_DATE)}}
                                    </div>
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>เวลา:</b></label> {{ $symper->SYM_TIME}}
                                    </div>                                   
                                </div>   
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>แพ้ยา :</b></label>  &nbsp; {{ $symper->SYM_DRUG_ALLERGY}}
                                    </div>
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>โรคประจำตัว:</b></label> &nbsp; {{ $symper->SYM_ROKE}}
                                    </div>
                                                                     
                                </div>   
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>อาการ :</b></label>  &nbsp;{{ $symper->SYM_AKAN}}
                                    </div> 
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>Diag :</b></label> &nbsp; {{ $symper->SYM_DIAG}}
                                    </div>                          
                                </div>   

                            
                        </div> 
                        <div class="modal-footer shadow lg">                
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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


                </div> 
           
                <div class="card-footer bg-info shadow lg">                
                                 
                </div>
            </div> 
        </form>

                </div>
            </div>
        </section>
  

<script src="{{ asset('js/jquery.min.js') }}"></script>

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
                '<select name="SYM_DETAIL_DRUGID[]" id="SYM_DETAIL_DRUGID[]" class="form-control">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($drugs as $drug)'+                                            
                '<option value="{{ $drug ->DRUG_ID }}">{{ $drug-> DRUG_NAME}}</option>'+                                           
                '@endforeach' +                                                                                                                                                                             
                '</select>'+
                '</td>'+ 
                '<td>'+ 
                '<select name="SYM_DETAIL_DRUGUNIT[]" id="SYM_DETAIL_DRUGUNIT[]" class="form-control" >'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($units as $unit)'+                                            
                '<option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option> '+                                           
                '@endforeach' +                                                                                                                                                                             
                '</select>'+
                '</td>'+ 
                '<td>'+
                '<input name="SYM_DETAIL_DRUGQTY[]" id="SYM_DETAIL_DRUGQTY[]" class="form-control">'+
                '</td>'+ 
                '<td>'+
                '<input name="SYM_DETAIL_DRUGPRICE[]" id="SYM_DETAIL_DRUGPRICE[]" class="form-control input-sm">'+
                '</td>'+               
                '<td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>'+
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


</script>
@endsection
