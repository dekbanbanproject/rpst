@extends('layouts.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ลงทะเบียนคนไข้</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ลงทะเบียนคนไข้</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">ลงทะเบียนคนไข้</h5>         
            <a href="{{ url('Mainpage/clinic_per') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>                               
        </div>


        <!-- <div class="card shadow mb-4"> -->
            
            <form action="{{ route('Clinic.persave') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
            <div class="card-body shadow lg">
                            <div class="form-row">
                                    <div class="col-md-1 mb-1 text-left">
                                        <label for="validationServer01">คิวที่</label>
                                        <input name ="PER_QU" id="PER_QU" value="{{ $refnumbers }}" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                            <div class="valid-feedback">คิว!</div>
                                    </div>
                                    <div class="col-md-2 mb-2 text-left">
                                        <label for="validationServer01">คำนำหน้า</label>                                    
                                            <select name="PER_PNAME" id="PER_PNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                                <option value="">-เลือก-</option>
                                                @foreach ($pres as $pre)                                            
                                                    <option value="{{ $pre ->PRE_ID }}">{{ $pre-> PRE_NAME}}</option>                                            
                                                @endforeach 
                                            </select> 
                                                                                
                                    </div>
                                    <div class="col-md-5 mb-3 text-left">
                                        <label for="validationServer01">ชื่อ</label>
                                        <input name ="PER_FNAME" id="PER_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                            <div class="valid-feedback">ชื่อ!</div>
                                    </div>
                                    <div class="col-md-4 mb-3 text-left">
                                        <label for="validationServer01">นามสกุล</label>
                                        <input name ="PER_LNAME" id="PER_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                            <div class="valid-feedback"> นามสกุล! </div>
                                    </div>
                            </div>
                        
                        <div class="form-row">                   
                            <div class="col-sm-3 text-left">
                                <div class="form-group">
                                    <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                    <img src="{{ asset('img/person/dafault.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:260px;">
                                </div>
                                <div class="form-group">
                                    <input style="font-family: 'Kanit', sans-serif;" type="file" name="PER_IMG" id="PER_IMG" class="form-control input-sm" onchange="readURL(this)" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                </div>
                            </div>
                            <div class="col-sm-9">                          
                                <div class="form-row">
                                    <div class="col-md-7 mb-3 text-left">
                                        <label for="validationServer01">บัตรประชาชน</label>
                                        <input name ="PER_CID" id="PER_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> บัตรประชาชน! </div>
                                    </div>
                                    <div class="col-md-5 mb-3 text-left">
                                        <label for="validationServer01">เบอร์โทร</label>
                                        <input name ="PER_TEL" id="PER_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback"> เบอร์โทร! </div>
                                    </div>
                                </div>
                                <div class="form-row">                               
                                        <div class="col-md-8 mb-3 text-left">
                                            <label for="validationServer01">สิทธิ์</label>
                                                <select name="SIT_ID" id="SIT_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                                    <option value="">--เลือก--</option>
                                                    @foreach ($sits as $sit)                                            
                                                        <option value="{{ $sit ->SIT_ID }}">{{ $sit->SIT_NAME}}</option>                                            
                                                    @endforeach 
                                                </select> 
                                        </div> 
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="PER_AGE">อายุ</label>
                                            <input name ="PER_AGE" id="PER_AGE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> อายุ! </div>
                                        </div>              
                                    </div> 
                           
                                <div class="form-row">
                                        <div class="col-md-2 mb-3 text-left">
                                            <label for="validationServer01">บ้านเลขที่</label>
                                            <input name ="ADDRESS_BANNO" id="ADDRESS_BANNO" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> บ้านเลขที่! </div>
                                        </div>
                                        <div class="col-md-2 mb-3 text-left">
                                            <label for="validationServer01">หมู่ที่</label>
                                            <input name ="ADDRESS_MOO" id="ADDRESS_MOO" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> หมู่ที่! </div>
                                        </div>
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="validationServer01">บ้าน</label>
                                            <input name ="ADDRESS_BAN" id="ADDRESS_BAN" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> บ้าน! </div>
                                        </div>
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="validationServer01">ตำบล</label>
                                            <input name ="ADDRESS_TUMBON" id="ADDRESS_TUMBON" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> ตำบล! </div>
                                        </div>
                                    </div>                               
                                <div class="form-row">
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="validationServer01">อำเภอ</label>
                                            <input name ="ADDRESS_AMPHER" id="ADDRESS_AMPHER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> อำเภอ! </div>
                                        </div>
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="validationServer01">จังหวัด</label>
                                            <input name ="ADDRESS_PROVINCE" id="ADDRESS_PROVINCE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> จังหวัด! </div>
                                        </div>
                                        <div class="col-md-4 mb-3 text-left">
                                            <label for="validationServer01">รหัสไปรษณีย์</label>
                                            <input name ="ADDRESS_POSECODE" id="ADDRESS_POSECODE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                <div class="valid-feedback"> รหัสไปรษณีย์! </div>
                                        </div>                                
                                    </div>
                                </div>

                            </div>                          
                        </div>  
                                                  
                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 mb-10 text-right">                      
                                <!-- <h5>ค้นหารายชื่อผู้ป่วย</h5> -->
                            </div> 
                           
                            <div class="col-md-2 mb-2"> 
                            <button class="float-sm-right btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                            </div> 
                        </div>
                    </div>
                </div> 
            </form> 
        </div> 
    </div> 
</div>
</div> 
</div>
</div> 
</div>
</section> 

<!-- <video src="" id="video" width="250" height="250" autoplay></video>
<br/> -->
<!-- <script>
    var video=document.getElementById('video');

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
    navigator.MediaDevices.getUserMedia({ video:true, audio:true }).then(function(stream){
        video.src=window.URL.createObjectURL(stream);
    });
    }
    var canvas=document.getElementById('canvas');
    var context=canvas.getContext('2d');
    document.getElementById('snap').addEventListener('click',function(){
        context.drawImage(video,0,0,250,250);
    });

</script> -->


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
    
@endsection
