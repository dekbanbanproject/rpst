@extends('layouts.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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

  function formateDatetime($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $H= date("H",strtotime($strDate));
    $I= date("i",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];

  return  "$strDay $strMonthThai $strYear $H:$I";
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
    <div class="card shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">Report</h5>
            <!-- <a href="{{ route('sup.supindex') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>                                -->
            <form action="{{ route('Clinic.reportpdf') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf 
                    <div class="row">
                    <div class="col-md-3">   </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                            <div class="col-md-0.5"> วันที่</div>
                            <div class="col-md-2">             
                                <input type="date"  name = "DATE_BIGIN"  id="DATE_BIGIN"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >                    
                            </div>
                            <div class="col-md-0.5"> ถึง  </div>
                            <div class="col-md-2">    
                                <input type="date"  name = "DATE_END"  id="DATE_END"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >            
                            </div> 
                            <div class="col-sm-2 text-left">
                                <span>
                                    <button type="submit" class="btn btn-info" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;"><i class="fas fa-print"></i>&nbsp;&nbsp;&nbsp;&nbsp;พิมพ์</button>
                                </span> 
                            </div>          
                        </div> 
                </form>
        </div>
      
        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
            <!-- <table class="table table-hover" id="dataTable" width="100%" > -->
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="5%">ลำดับ</th>                          
                            <th style="text-align: center;color:#7B0099">วันที่</th>  
                            <th style="text-align: center;color:#7B0099">เวลา</th>                           
                            <th style="text-align: center;color:#7B0099">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;color:#7B0099">แพ้ยา</th> 
                            <th style="text-align: center;color:#7B0099">โรคประจำตัว</th>  
                            <th style="text-align: center;color:#7B0099">อาการ</th> 
                            <th style="text-align: center;color:#7B0099">Diag</th> 
                            <th style="text-align: center;color:#7B0099">ยอดรวม</th> 
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($reportsyms as $reportsym)
                            <?php $number++;  ?>
                        <tr>
                            <td style="text-align: center;">{{ $number}}</td>    
                            <td style="text-align: center;">{{DateThai($reportsym->SYM_DATE) }}</td>   
                            <td style="text-align: center;">{{ $reportsym->SYM_TIME}}</td> 
                            <td style="text-align: center;">{{ $reportsym->PER_FNAME}}&nbsp;{{ $reportsym->PER_LNAME}}</td>  
                            <td style="text-align: center;">{{ $reportsym->SYM_DRUG_ALLERGY}}</td> 
                            <td style="text-align: center;">{{ $reportsym->SYM_ROKE}}</td>   
                            <td style="text-align: center;">{{ $reportsym->SYM_AKAN}}</td>   
                            <td style="text-align: center;">{{ $reportsym->SYM_DIAG}}</td>  
                            <td style="text-align: center;">{{number_format( $reportsym->SYM_SUMTOTALPRICE,2)}}</td> 
                        </tr>                       
                        @endforeach  
                    </tbody>
                </table>     
            </div>
        
        <div class="card-footer shadow lg">
        
        </div>
    </div>
</div> 

</section>
<script src="{{ asset('datepicker/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('datepicker/dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src="{{ asset('datepicker/dist/locales/bootstrap-datepicker.th.min.js') }}" charset="UTF-8"></script>

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

$(document).ready(function () {

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    todayBtn: true,
    language: 'th',       //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
    thaiyear: true,
    autoclose: true      //Set เป็นปี พ.ศ.
});  //กำหนดเป็นวันปัจุบัน
});


function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
    }
 
</script>


@endsection