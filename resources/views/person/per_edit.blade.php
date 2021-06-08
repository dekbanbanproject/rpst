@extends('layouts.admin')
@section('content')

<div class="container-fluid">

<div class="header">
    <div class="title">
    <h3>แก้ไขผู้เช่า</h3>
    </div>
</div>

<form action="{{ route('Per.per_update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
                                              
    <div class="card mb-3" style="max-width: 2350px;">
        <div class="row no-gutters">            
            <div class="col-md-12">
                <div class="card-body">   
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($pers->PERSON_IMG)) }}" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                <!-- <img src="{{ asset('img/person/' .$pers->PERSON_IMG)}}" id="preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;"> -->
                            </div>
                            <div class="form-group">
                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="PERSON_IMG" id="PERSON_IMG" class="form-control input-sm" onchange="readURL(this)">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        </div>
                        <input type="hidden" name="PERSON_ID" value="{{$pers->PERSON_ID }}">
                        <div class="col-sm-8">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">ชื่อ</label>
                                    <input value="{{$pers->PERSON_FNAME }}" name ="PERSON_FNAME" id="PERSON_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="valid-feedback">
                                        ชื่อ! 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServerPrice">นามสกุล</label>                           
                                    <input value="{{$pers->PERSON_LNAME }}" name ="PERSON_LNAME" id="PERSON_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="valid-feedback">
                                        นามสกุล! 
                                        </div>                     
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">บัตรประชาชน</label>
                                    <input value="{{$pers->PERSON_CID }}" name ="PERSON_CID" id="PERSON_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="valid-feedback">
                                        บัตรประชาชน! 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServerPrice">เบอร์โทร</label>                           
                                    <input value="{{$pers->PERSON_TEL }}" name ="PERSON_TEL" id="PERSON_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">   
                                        <div class="valid-feedback">
                                        บัตรประชาชน! 
                                        </div>                   
                                </div>
                            </div>  
                            <div class="form-row">                         
                                <div class="col-md-6 mb-3">
                                    <label for="validationServerPrice">ห้อง</label>  
                                        <select name="PERSON_ROOM_ID" id="PERSON_ROOM_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                            <option value="">--เลือกห้อง--</option>
                                                @foreach ($rooms as $room)
                                                    @if($room->ROOM_ID == $pers->PERSON_ROOM_ID )
                                                        <option value="{{ $room ->ROOM_ID }}"selected>{{ $room-> ROOM_NAME}}</option>                                           
                                                    @else
                                                    <option value="{{ $room ->ROOM_ID }}">{{ $room-> ROOM_NAME}}</option>  
                                                    @endif
                                                @endforeach
                                        </select>                   
                                </div>                               
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">ที่อยู่</label>
                                    <textarea name ="PERSON_ADDRESS" id="PERSON_ADDRESS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" line="6">{{$pers->PERSON_ADDRESS }}</textarea>
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
    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;Save</button>
</form>
</div>


<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>

<script>
    function readURL(input) {
        var fileInput = document.getElementById('PERSON_IMG');
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

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
</script>

@endsection
