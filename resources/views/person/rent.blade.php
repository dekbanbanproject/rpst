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
            <a href="{{ url('person/per_index ')  }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> เก็บค่าเช่าห้อง</a>
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
                            <th style="text-align: center;">หมายเลขห้อง</th>  
                            <th style="text-align: center;">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;">รวมยอดชำระ</th>  
                            <th style="text-align: center;">สถานะชำระ</th>                                                                                                                 
                            <th style="text-align: center;"width="15%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($rents as $rent)
                            <?php $number++; 
                            $status =  $rent -> RENT_PAY_STATUS;

                            if( $status === 'PAID'){
                            $statuscol =  "badge badge-success";

                            }else if($status === 'UNPAID'){
                            $statuscol =  "badge badge-danger";
                           
                            }else{
                            $statuscol =  "badge badge-secondary";
                            } ?>
                                <tr>
                                <input type="hidden" class="deleteID" value="{{ $rent->RENT_ID }}">
                                    <td>{{ $number}}</td> 
                                    <td style="text-align: center;">{{$rent->RENT_NO}}</td>    
                                    <td style="text-align: center;">{{DateThai($rent->RENT_DATE)}}</td>   
                                    <td style="text-align: center;">{{$rent->ROOM_NAME}}</td>   
                                    <td style="text-align: center;">{{$rent->PERSON_FNAME}}&nbsp;&nbsp; {{$rent->PERSON_LNAME}}</td>  
                                    <td style="text-align: center;">{{number_format($rent->RENT_TOTAL_PRICE,2)}}</td> 
                                    <td class="text-font" align="center">
                                        <span class="{{$statuscol}}">{{$rent->PAYSTATUS_NAME_TH}}</span>
                                    </td>
                               
                                    <td> 
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#EditModal{{ $rent->RENT_ID}}"><i class="fab fa-btc"></i></button>
                                        <a href="{{ url('person/rent_detail/'.$rent->RENT_ID)  }}" class="btn btn-sm btn-success"><i class="fas fa-qrcode"></i></a>
                                        <a href="{{ url('person/rent_pdf/'.$rent->RENT_ID)  }}" class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                        <!-- <a href="{{ url('person/rent/rent_destroy/'.$rent->RENT_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบบิลเลขที่ &nbsp;{{$rent->RENT_NO}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <button type="button" class="btn btn-sm btn-danger deleteRent"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>
                                </tr>
                                 <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$rent->RENT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('Re.update_status') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">ชำระเงิน</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="form-row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                                        <!-- <img src="{{ asset('img/person/' .$rent->PERSON_IMG)}}" id="preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;"> -->
                                                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($rent->PERSON_IMG)) }}" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <input style="font-family: 'Kanit', sans-serif;" type="file" name="PERSON_IMG" id="PERSON_IMG" class="form-control input-sm" onchange="readURL(this)"> -->
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </div>
                                                </div>                                               
                                                <div class="col-sm-8">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationServer01">ชื่อ</label>
                                                            <input value="{{$rent->PERSON_FNAME }}" name ="PERSON_FNAME" id="PERSON_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" readonly> 
                                                                <div class="valid-feedback">
                                                                ชื่อ! 
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationServerPrice">นามสกุล</label>                           
                                                                <input value="{{$rent->PERSON_LNAME }}" name ="PERSON_LNAME" id="PERSON_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" readonly> 
                                                                    <div class="valid-feedback">
                                                                    นามสกุล! 
                                                                    </div>                     
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationServerPrice">สถานะการชำระ</label>                           
                                                                <div class="text-font">
                                                                    <span class="{{$statuscol}}">{{$rent->PAYSTATUS_NAME_TH}}</span>
                                                                </div> 
                                                                <select name="PAYSTATUS_NAME_EN" id="PAYSTATUS_NAME_EN" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                                                    <option value="">--เลือกสถานะการชำระ--</option>
                                                                        @foreach ($paystatuss as $paystatus)
                                                                        @if($paystatus->PAYSTATUS_NAME_EN == $rent->RENT_PAY_STATUS )
                                                                            <option value="{{ $paystatus ->PAYSTATUS_NAME_EN }}" selected>{{ $paystatus-> PAYSTATUS_NAME_TH}}</option>                                           
                                                                            @else
                                                                            <option value="{{ $paystatus ->PAYSTATUS_NAME_EN }}">{{ $paystatus-> PAYSTATUS_NAME_TH}}</option>  
                                                                            @endif
                                                                        @endforeach
                                                                </select>       
                                                            </div>
                                                        </div>
                                                    </div>      
                                                                                                                                             
                                           
                                            <input type="hidden" value="{{$rent->RENT_ID}}" name ="RENT_ID" id="RENT_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="modal-footer">
                                            
                                        </div>
                                    </div>
                                </form>                                 
                            </div>
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