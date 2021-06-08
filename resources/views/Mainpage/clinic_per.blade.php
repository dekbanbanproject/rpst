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

  
</style>

<section class="col-md-12">
        <div class="card shadow lg">
        <br>
        <form action="{{ route('Clinic.per_search') }}" method="POST">
                                @csrf 
            <div class="form-row">
                <div class="col-md-3 mb-3 text-right">                      
                    <h5>ค้นหารายชื่อผู้ป่วย</h5>
                </div> 
                <div class="col-md-6 mb-6">                      
                    <span><input type="search"  name="search" class="form-control " value="{{$search}}"></span>
                </div> 
                <div class="col-md-1 mb-1 text-left"> 
                    <button class="btn btn-sm btn-warning text-white" type="submit" style="font-size:17px "><i class="fa fa-search fa-sm text-white" style="font-size:15px "></i>&nbsp;&nbsp;ค้นหา </button>                                                 
                </div> 
                <div class="col-md-2 mb-2"> 
                   
                </div> 
            </div>
     
     </form>
    <div class="card shadow mb-4 ">
        <div class="card-header shadow lg py-3 ">
            <h6 class="float-sm-left  font-weight-bold text-primary">ทะเบียนคนไข้</h6>         
            <a href="{{ url('Mainpage/clinic_per_create') }}" class="float-sm-right btn btn-sm btn-success shadow-lg"><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp; ลงทะเบียนคนไข้</a>                               
        </div>
       
        <div class="card-body shadow lg"> 
        <table class="table table-hover" id="example1" width="100%" >    
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099"width="3%">ลำดับ</th>  
                            <!-- <th style="text-align: center;"width="5%">สถานะ</th>    -->
                            <th style="text-align: center;color:#7B0099" width="8%">รูปภาพ</th>  
                            <th style="text-align: center;color:#7B0099" width="15%">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;color:#7B0099" width="10%">CID</th> 
                            <th style="text-align: center;color:#7B0099">ที่อยู่</th> 
                            <th style="text-align: center;color:#7B0099"width="10%">เบอร์โทร</th> 
                            <th style="text-align: center;color:#7B0099"width="9%">สิทธิ์การรักษา</th> 
                            <th style="text-align: center;color:#7B0099"width="5%">คิวที่</th>   
                            <th style="text-align: center;color:#7B0099"width="7%">สถานะ</th>                                            
                            <th style="text-align: center;color:#7B0099"width="17%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($pers as $per)
                        <?php $number++; 
                            $status =  $per ->STATUS;

                            if( $status === 'PAID'){
                            $statuscol =  "badge badge-success";

                            }else if($status === 'UNPAID'){
                            $statuscol =  "badge badge-warning";

                            }else if($status === 'OVERDUE'){
                            $statuscol =  "badge badge-danger";
                            
                            }else if($status === 0){
                            $statuscol =  "badge badge-info";

                            }else{
                            $statuscol =  "badge badge-secondary";
                            } ?>
                                <tr class="{{ $per->PER_ID }}">                                    
                                    <td style="text-align: center;">{{ $number}}</td>                                                                    
                                    <td style="text-align: center;"><img src="data:image/png;base64,{{ chunk_split(base64_encode($per->PER_IMG)) }}" alt="Image" class="img-thumbnail" style="height:60px; width:70px;"> </td> 
                                    <td style="text-align: center;">{{ $per->PRE_NAME}}&nbsp; {{ $per->PER_FNAME}}&nbsp;{{ $per->PER_LNAME}}</td>                                 
                                    <td style="text-align: center;">{{ $per->PER_CID}}</td> 
                                    <td style="text-align: center;">{{ $per->ADDRESS_BANNO}}/{{ $per->ADDRESS_MOO}}&nbsp;จังหวัด {{ $per->ADDRESS_PROVINCE}}</td>   
                                    <td style="text-align: center;">{{ $per->PER_TEL}}</td>   
                                    <td style="text-align: center;">{{ $per->SIT_NAME}}</td>  
                                    <td style="text-align: center;">{{ $per->PER_QU}}</td>  
                                    <td class="text-font" align="center">
                                        <span class="{{$statuscol}}">{{ $per->STATUS_NAME_TH}}</span>
                                    </td>                               
                                    <td style="text-align: center;">  
                                        @if($per->PER_QU ==000)
                                       <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#QnoModal{{$per->PER_ID}}">Q</a>
                                       @endif
                                       @if($per->PER_QU >000)
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#StatusModal{{ $per->PER_ID}}"><i class="fab fa-btc"></i></button>
                                       
                                        <a href="{{ url('sym/sym_create/'.$per->PER_ID ) }}" class="btn btn-sm btn-primary"><span style="font-size: 1em; color: white;"> <i class="fas fa-briefcase-medical"></i> </span></a>
                                        @endif
                                       
                                        <a href="{{ url('Mainpage/clinic_per_edit/'.$per->PER_ID ) }}" class="btn btn-sm btn-warning "><span style="font-size: 1em; color: white;"><i class="fas fa-fw fa-edit"></i> </span></a>
                                        <!-- <a href="{{ url('clinic_per-destroy/'.$per->PER_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบ&nbsp;{{ $per->PER_FNAME}}&nbsp;{{ $per->PER_LNAME}}  ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <a title="Delete" id="perdelete" class="btn btn-sm btn-danger" href="{{ route('Clinic.delete')}}" data-token="{{csrf_token()}}" data-id="{{$per->PER_ID}}"><i class="fas fa-fw fa-trash"></i></a>
                                    
                                    </td>
                                </tr> 

 <!-- view/.largeModal-->
 <div class="modal fade" id="QnoModal{{$per->PER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content"> 
                <form action="{{ route('Clinic.updateperq') }}" method="POST">
                                @csrf          
                        <div class="modal-header shadow lg">                
                            <h4 style="color:#7CBB00">จองคิว&nbsp;&nbsp;{{ $per->PER_FNAME}}&nbsp;{{ $per->PER_LNAME}}</h4>
                        </div>
                        <div class="modal-body shadow lg"> 
                          
                                <div class="form-row">
                                    <div class="col-md-3 mb-3 text-right"> 
                                    <label for="" style="color:#7B0099"><b>คิวเลขที่ :</b></label>
                                    </div>   
                                    <div class="col-md-7 mb-7 text-left">                                         
                                        <input type="text" value="{{ $refnumbers }}" name="PER_QU" id="PER_QU" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 mb-2 text-left"> 
                                    </div>                               
                                </div>   
                              
                                <input type="hidden" value="{{ $per->PER_ID }}" name="PER_ID" id="PER_ID" class="form-control input-sm">
                            
                        </div> 
                        <div class="modal-footer shadow lg"> 
                                <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">จองคิว</button>  -->
                                <button class="btn  btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;จองคิว </button>              
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div> 
                    </form>
                </div> 
            </div> 
        </div> 
    </div> 

<!-- view/.StatusModal-->
<div class="modal fade" id="StatusModal{{$per->PER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content"> 
                <form action="{{ route('Clinic.updatestatus') }}" method="POST">
                                @csrf          
                        <div class="modal-header shadow lg">                
                            <h4 style="color:#7CBB00">สถานะการชำระเงิน&nbsp;&nbsp;คุณ&nbsp; {{ $per->PER_FNAME}}&nbsp;{{ $per->PER_LNAME}}</h4>
                        </div>
                        <div class="modal-body shadow lg"> 
                            <input type="hidden" value="{{ $per->PER_ID }}" name="PER_ID" id="PER_ID" class="form-control input-sm">
                                <div class="form-row">
                                    <!-- <div class="col-md-2 mb-2 text-right"> 
                                        <label for="" style="color:#7B0099"><b>ยอดรวม :</b></label>
                                    </div>   
                                    <div class="col-md-2 mb-2 ">  
                                       
                                    </div>
                                    <div class="col-md-1 mb-1 text-left">  
                                        <label for="" style="color:#7B0099"><b>บาท </b></label>   
                                    </div> -->
                                    <div class="col-md-1 mb-1">  
                                        
                                    </div>
                                    <div class="col-md-2 mb-2 text-right"> 
                                    <label for="" style="color:#7B0099"><b>สรุปการจ่ายเงิน:</b></label>
                                    </div>                                    
                                  
                                    <div class="col-md-8 mb-8 text-left">  
                                        <select name="STATUS_NAME_EN" id="STATUS_NAME_EN" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                            <option value="">-สถานะการชำระเงิน-</option>
                                                @foreach ($perstatuss as $perstatus)                                               
                                                    <option value="{{ $perstatus ->STATUS_NAME_EN }}">{{ $perstatus-> STATUS_NAME_TH}}</option>                                           
                                                @endforeach
                                        </select>                       
                                    </div> 
                                    <div class="col-md-1 mb-1 "> 
                                   
                                    </div>                                                                    
                                </div>   
                            </div>
                        <div class="modal-footer shadow lg"> 
                                <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">จองคิว</button>  -->
                                <button class="btn  btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;ปรับสถานะ </button>              
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div> 
                    </form>
                </div> 
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
    </div> 
    </div> 
</section>

@endsection
