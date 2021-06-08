
@extends('layouts.clinic_main_font')
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
        function formatetime($strtime)
        {
        $H = substr($strtime,0,5);
        return $H;
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');        
?>

<br>
<br>
<center>    
    <div class="block" style="width: 90%;">
<!--================Featured Section Start =================-->
  <section class="section-margin mb-lg-100">
    <div class="container-fluid">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">รายชื่อคนไข้ที่มารักษา</h4>
        <h2>Medical Service</h2>
      </div>

    <div class="container-fluid">
    <form action="{{route('Rep.report_search')}}" method="post">
    @csrf
      <div class="row">
            <div class="col-md-1 text-right">
                 
            </div>          
            <div class="col-md-0.5"> วันที่</div>
            <div class="col-md-2">             
                <input type="date"  name = "DATE_BIGIN"  id="DATE_BIGIN"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >                    
            </div>
            <div class="col-md-0.5"> ถึง  </div>
            <div class="col-md-2">    
                <input type="date"  name = "DATE_END"  id="DATE_END"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >            
            </div> 
            <div class="col-sm-3"> 
            <input name = "search"  id="search"  class="form-control input-lg "  value="{{$search}}">            
            </div>
            <div class="col-sm-1 text-left">
                <span>
                    <button type="submit" class="btn btn-sm btn-info" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;">ค้นหา</button>
                </span> 
            </div>  
            <div class="col-sm-0.5 text-right"> Total :</div>
            <div class="col-lg-1">  
                <h3 style="color:#FE126B"><b> {{number_format($totals,2),2}} </b></h3>&nbsp;
            </div>
        </form>
            <div class="col">
           
        </div>
    </div> 

    <br>

        <div class="card-body shadow lg">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="3%">ลำดับ</th>  
                            <th style="text-align: center;"width="13%">วันที่</th>                          
                            <th style="text-align: center;" >ชื่อ-นามสกุล</th> 
                            <th style="text-align: center;" width="12%">เบอร์โทร</th>  
                            <th style="text-align: center;" width="10%">อายุ</th>  
                            <th style="text-align: center;" width="15%">Total</th>              
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($syms as $sym)
                            <?php $number++;  ?>
                        <tr>                            
                            <td style="text-align: center;">{{ $number}}</td>                                                               
                            <td style="text-align: center;">{{DateThai($sym->SYM_DATE) }}</td> 
                            <td style="text-align: center;">{{ $sym->PER_FNAME}}&nbsp;&nbsp; {{ $sym->PER_LNAME}}</td>
                            <td style="text-align: center;">{{ $sym->PER_TEL}}</td> 
                            <td style="text-align: center;">{{ $sym->PER_AGE}}</td> 
                            <td style="text-align: center;">{{ $sym->SYM_SUMTOTALPRICE}}</td> 
                            <td style="text-align: center;">
                                <a href="" class="btn btn-sm btn-info"><i class="fas fa-qrcode"></i></a> 
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#EditModal"><i class="fab fa-btc"></i></button>
                            </td>                           
                        </tr> 
                        @endforeach           
                    </tbody>
                </table>     
            </div>
        </div>          
      </div>
    </div>
  </section>
  </div>
  <!--================Featured Section End =================-->

  @endsection