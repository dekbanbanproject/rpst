@extends('layouts.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ทะเบียนรักษาคนไข้</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ทะเบียนรักษาคนไข้</li>
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
    <div class="card shadow shadow lg">
        <div class="card-header lg">
            <h6 class="float-sm-left  font-weight-bold text-primary">ทะเบียนรักษาคนไข้</h6>         
            <!-- <a href="{{ url('sym/sym_create') }}" class="float-sm-right btn btn-sm btn-success shadow-lg"><i class="fas fa-plus fa-sm text-white-50" style="font-size:15px "></i>&nbsp; ทำรายการ</a>                                -->
        </div>
       
        <div class="card-body shadow lg">  
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif      
            <!-- <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="3%">ลำดับ</th>  
                            <th style="text-align: center;color:#7B0099" width="12%">วันที่</th> 
                            <th style="text-align: center;color:#7B0099" width="5%">เวลา</th> 
                            <th style="text-align: center;color:#7B0099" width="5%">รูปภาพ</th>  
                            <th style="text-align: center;color:#7B0099" width="12%">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;color:#7B0099" width="10%">แพ้ยา</th> 
                            <th style="text-align: center;color:#7B0099" width="10%">โรคประจำตัว</th> 
                            <th style="text-align: center;color:#7B0099" >อาการ</th> 
                            <th style="text-align: center;color:#7B0099" width="5%">Diag</th> 
                            <th style="text-align: center;color:#7B0099" width="8%">Total</th> 
                            <th style="text-align: center;color:#7B0099"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($perinfos as $perinfo)
                            <?php $number++;  ?>
                                <tr>                                    
                                    <td style="text-align: center;">{{ $number}}</td> 
                                    <td style="text-align: center;">{{DateThai($perinfo->SYM_DATE) }}</td> 
                                    <td style="text-align: center;">{{ $perinfo->SYM_TIME}}</td> 
                                    <td style="text-align: center;"><img src="data:image/png;base64,{{ chunk_split(base64_encode($perinfo->PER_IMG)) }}" alt="Image" class="img-thumbnail" style="height:50px; width:60px;"> </td> 
                                    <td style="text-align: center;">{{ $perinfo->PER_FNAME}}&nbsp;{{ $perinfo->PER_LNAME}}</td>                                 
                                    <td style="text-align: center;">{{ $perinfo->SYM_DRUG_ALLERGY}}</td> 
                                    <td style="text-align: center;">{{ $perinfo->SYM_ROKE}}</td>   
                                    <td style="text-align: center;">{{ $perinfo->SYM_AKAN}}</td>   
                                    <td style="text-align: center;">{{ $perinfo->SYM_DIAG}}</td>    
                                    <td style="text-align: center;">{{ $perinfo->SYM_SUMTOTALPRICE}}</td>                                
                                    <td style="text-align: center;">  
                                        <a href="{{ url('sym/sym_edit/'.$perinfo->SYM_ID )  }}" class="btn btn-sm btn-warning"><span style="font-size: 1em; color: Green;"><i class="fas fa-fw fa-edit"></i> </span></a>
                                       
                                        <a title="Delete" id="symdelete" class="btn btn-sm btn-danger" href="{{ route('Clinic.symdelete')}}" data-token="{{csrf_token()}}" data-id="{{$perinfo->SYM_ID}}"><i class="fas fa-fw fa-trash"></i></a>
                                    
                                    </td>
                                </tr>  
                        @endforeach        
                    </tbody>
                </table>     
            </div>
            




        </div> 
    </div> 

</section>

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
