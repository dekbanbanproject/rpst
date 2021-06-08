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
            <h1 class="m-0 text-dark">แก้ไขทะเบียนคนไข้</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขทะเบียนคนไข้</li>
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
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">แก้ไขทะเบียนคนไข้</h5>         
            <a href="{{ url('Mainpage/clinic_per') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>                               
        </div>
  
<form action="{{ route('Clinic.perupdate') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    <input type="hidden" name="PER_ID" value="{{$pers->PER_ID }}">
   
        <div class="card-body shadow lg">
            <div class="row push">
                        <div class="col-md-12">
                        <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">คำนำหน้า</label>                                    
                                    <select name="PER_PNAME" id="PER_PNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                            <option value="">-เลือก-</option>
                                            @foreach ($pres as $pre) 
                                                @if($pers->PER_PNAME == $pre->PRE_ID)                                           
                                                    <option value="{{ $pre ->PRE_ID }}" selected>{{ $pre-> PRE_NAME}}</option> 
                                                    @else
                                                    <option value="{{ $pre ->PRE_ID }}" >{{ $pre-> PRE_NAME}}</option> 
                                                @endif                                           
                                            @endforeach 
                                        </select> 
                                                                              
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="validationServer01">ชื่อ</label>
                                    <input value="{{ $pers->PER_FNAME }}" name ="PER_FNAME" id="PER_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback">ชื่อ!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">นามสกุล</label>
                                    <input value="{{ $pers->PER_LNAME }}" name ="PER_LNAME" id="PER_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> นามสกุล! </div>
                                </div>
                            </div>
                    </div>
                </div>

                    <div class="row push">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($pers->PER_IMG)) }}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:260px;">
                            </div>
                            <div class="form-group">
                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="PER_IMG" id="PER_IMG" class="form-control input-sm" onchange="readURL(this)" required>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                            </div>
                        </div>
                        <div class="col-sm-9">                          
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label for="validationServer01">บัตรประชาชน</label>
                                    <input value="{{ $pers->PER_CID }}" name ="PER_CID" id="PER_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> บัตรประชาชน! </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="validationServer01">เบอร์โทร</label>
                                    <input value="{{ $pers->PER_TEL }}" name ="PER_TEL" id="PER_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> เบอร์โทร! </div>
                                </div>
                            </div>
                            <div class="form-row">                               
                                <div class="col-md-8 mb-3">
                                    <label for="validationServer01">สิทธิ์</label>
                                        <select name="SIT_ID" id="SIT_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                            <option value="">--เลือก--</option>
                                            @foreach ($sits as $sit)      
                                                @if($pers->SIT_ID == $sit->SIT_ID)
                                                    <option value="{{ $sit ->SIT_ID }}" selected>{{ $sit->SIT_NAME}}</option> 
                                                    @else
                                                    <option value="{{ $sit ->SIT_ID }}">{{ $sit->SIT_NAME}}</option> 
                                                @endif                                              
                                            @endforeach 
                                        </select> 
                                </div>  
                                <div class="col-md-4 mb-3">
                                    <label for="PER_AGE">อายุ</label>
                                    <input value="{{ $pers->PER_AGE }}" name ="PER_AGE" id="PER_AGE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> อายุ! </div>
                                </div>              
                            </div> 

                            <input type="hidden" value="{{$addrs->ADDRESS_ID}}" name ="ADDRESS_ID" id="ADDRESS_ID" class="form-control input-sm" >                                             
                           
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">บ้านเลขที่</label>
                                    <input value="{{$addrs->ADDRESS_BANNO}}" name ="ADDRESS_BANNO" id="ADDRESS_BANNO" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> บ้านเลขที่! </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">หมู่ที่</label>
                                    <input value="{{$addrs->ADDRESS_MOO}}" name ="ADDRESS_MOO" id="ADDRESS_MOO" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> หมู่ที่! </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">บ้าน</label>
                                    <input value="{{$addrs->ADDRESS_BAN}}" name ="ADDRESS_BAN" id="ADDRESS_BAN" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> บ้าน! </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">ตำบล</label>
                                    <input value="{{$addrs->ADDRESS_TUMBON}}" name ="ADDRESS_TUMBON" id="ADDRESS_TUMBON" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> ตำบล! </div>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">อำเภอ</label>
                                    <input value="{{$addrs->ADDRESS_AMPHER}}" name ="ADDRESS_AMPHER" id="ADDRESS_AMPHER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> อำเภอ! </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">จังหวัด</label>
                                    <input value="{{$addrs->ADDRESS_PROVINCE}}" name ="ADDRESS_PROVINCE" id="ADDRESS_PROVINCE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> จังหวัด! </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">รหัสไปรษณีย์</label>
                                    <input value="{{$addrs->ADDRESS_POSECODE}}" name ="ADDRESS_POSECODE" id="ADDRESS_POSECODE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> รหัสไปรษณีย์! </div>
                                </div>                                
                            </div>                                  
                        </div> 
                    </div>                          
                </div>                                
                <div class="modal-footer shadow lg">
                        <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
               
                </div>
           </div>  
        </div> 
    </div> 
    </form>
</div>


 <script>
        function readURL(input) {
            var fileInput = document.getElementById('PER_IMG');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#add_upload_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
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
