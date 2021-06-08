@extends('layouts.admin')
@section('content')

<div class="container-fluid">

<div class="header">
    <div class="title">
    <h3>แก้ไขผู้ไห้เช่า</h3>
    </div>
</div>

<form action="{{ route('OW.update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
                                              
    <div class="card mb-3" style="max-width: 2350px;">
        <div class="row no-gutters">            
            <div class="col-md-12">
                <div class="card-body">   
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                <!-- <img src="{{ asset('img/person/' .$ooners->OWNER_LOGO)}}" id="preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;"> -->
                               
                                <img id="preview" src="data:image/png;base64,{{ chunk_split(base64_encode($ooners->OWNER_LOGO)) }}" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                            </div>
                            <div class="form-group">
                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="OWNER_LOGO" id="OWNER_LOGO" class="form-control input-sm" onchange="readURL(this)">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <input type="hidden" name="OWNER_ID" value="{{$ooners->OWNER_ID }}">
                        <div class="col-sm-8">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">ชื่อ</label>
                                    <input value="{{$ooners->OWNER_NAME }}" name ="OWNER_NAME" id="OWNER_NAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="valid-feedback">
                                        ชื่อ! 
                                        </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">บัตรประชาชน</label>
                                    <input value="{{$ooners->OWNER_CID }}" name ="OWNER_CID" id="OWNER_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="valid-feedback">
                                        บัตรประชาชน! 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServerPrice">เบอร์โทร</label>                           
                                    <input value="{{$ooners->OWNER_TEL }}" name ="OWNER_TEL" id="OWNER_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">   
                                        <div class="valid-feedback">
                                        บัตรประชาชน! 
                                        </div>                   
                                </div>
                            </div>  
                            <div class="form-row">                          
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">ที่อยู่</label>
                                    <textarea name ="OWNER_ADDRESS" id="OWNER_ADDRESS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" rows="4">{{$ooners->OWNER_ADDRESS }}</textarea>
                                        <div class="valid-feedback">
                                        ที่อยู่! 
                                        </div>
                                </div>
                            </div>

                                  
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;Save</button>
</form>
</div>


<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>

<script>
 function readURL(input) {
        var fileInput = document.getElementById('OWNER_LOGO');
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();    
        var numb = input.files[0].size/4096;   
                    if(numb > 246){
                        alert('กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 246KB');
                            fileInput.value = '';
                            return false;
                        }    		
                    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                        var reader = new FileReader();            
                        reader.onload = function (e) {
                            $('#preview').attr('src', e.target.result);
                        }            
                        reader.readAsDataURL(input.files[0]);
                    }else{        
                                alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                                fileInput.value = '';
                                return false;       
                    }
                }

            
                $("#OWNER_LOGO").change(function () {
                    readURL(this);
                });


  
</script>

@endsection
