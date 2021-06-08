@extends('layouts.admin')
@section('content')
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
    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายการค่าเช่าห้อง</h1>
            <!-- <a href="{{ url('person/per_index ')  }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-print fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;&nbsp; Print</a> -->
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการค่าเช่าห้อง</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="5%">ลำดับ</th>                          
                            <th style="text-align: center;">เลขที่บิล</th>  
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">รายการ</th>  
                            <th style="text-align: center;">มิเตอร์เก่า</th>  
                            <th style="text-align: center;">มิเตอร์ใหม่</th>  
                            <th style="text-align: center;">จำนวน</th> 
                            <th style="text-align: center;">ราคา</th> 
                            <th style="text-align: center;">ยอดรวม</th>                                                                                                                 
                            <!-- <th style="text-align: center;"width="10%">จัดการ</th>  -->
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($rent_des as $rent_de)
                            <?php $number++;  ?>
                                <tr>
                                    <td>{{ $number}}</td> 
                                    <td style="text-align: center;">{{$rent_de->RENT_NO}}</td>    
                                    <td style="text-align: center;">{{DateThai($rent_de->RENT_DATE)}}</td>   
                                    <td style="text-align: center;">{{$rent_de->RENT_DETAIL_LIST}}</td>   
                                    <td style="text-align: center;">{{$rent_de->RENT_DETAIL_METER_1}}</td>  
                                    <td style="text-align: center;">{{$rent_de->RENT_DETAIL_METER_2}}</td> 
                                    <td style="text-align: center;">{{$rent_de->RENT_DETAIL_QTY}}</td>   
                                    <td style="text-align: center;">{{number_format($rent_de->RENT_DETAIL_PRICE,2)}}</td> 
                                    <td style="text-align: center;">{{number_format($rent_de->RENT_DETAIL_TOTAL,2)}}</td>     
                                    <!-- <td>                                    
                                        <a href="{{ url('person/rent/rent_detail_destroy/'.$rent_de->RENT_DETAIL_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบข้อมูลใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a>
                                    </td> -->
                                </tr>
                       
                        @endforeach                                                  
                    </tbody>
                </table>     
            </div>
        </div>
    </div>
</div> 
</div>


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

