@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายชื่อผู้เช่า</h1>
        <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;&nbsp; เพิ่มผู้เช่า</a>
        <!-- &nbsp;&nbsp;<a href="{{ url('products/pdf/productspdf')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-print fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;&nbsp; Print</a> -->
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายชื่อผู้เช่า</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="3%">ลำดับ</th>  
                            <th style="text-align: center;"width="3%">สถานะ</th>                          
                            <th style="text-align: center;">CID</th> 
                            <th style="text-align: center;" width="8%">รูปภาพ</th>  
                            <th style="text-align: center;">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;">ที่อยู่</th> 
                            <th style="text-align: center;"width="10%">เบอร์โทร</th> 
                            <th style="text-align: center;"width="7%">ห้อง</th> 
                            <th style="text-align: center;"width="10%">คิดค่าเช่า</th>                                                                                                                                        
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($pers as $per)
                            <?php $number++;  ?>
                                <tr>
                                    <input type="hidden" class="deleteID" value="{{ $per->PERSON_ID }}">
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td align="center" width="5%">
                                        <div class="custom-control custom-switch custom-control-lg ">
                                            @if($per-> PERSON_STATUS == 'True' )
                                                <input type="checkbox" class="custom-control-input" id="{{ $per-> PERSON_ID }}" name="{{ $per-> PERSON_ID }}" onchange="switchperson({{ $per-> PERSON_ID }});" checked>
                                            @else
                                                <input type="checkbox" class="custom-control-input" id="{{ $per-> PERSON_ID }}" name="{{ $per-> PERSON_ID }}" onchange="switchperson({{ $per-> PERSON_ID }});">
                                            @endif
                                                <label class="custom-control-label" for="{{ $per-> PERSON_ID }}"></label>
                                        </div>
                                    </td>                                 
                                    <td style="text-align: center;">{{$per->PERSON_CID}}<?php echo DNS1D::getBarcodeHTML($per->PERSON_CID, 'C128');  ?></td> 
                                    <!-- <td style="text-align: center;"><img src="{{ asset('img/person/' .$per->PERSON_IMG)}}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"></td> -->
                                    <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($per->PERSON_IMG)) }}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"> </td>
                                    <td style="text-align: center;">{{ $per->PERSON_FNAME}}&nbsp;&nbsp; {{ $per->PERSON_LNAME}}</td>
                                    <td style="text-align: center;">{{ $per->PERSON_ADDRESS}}</td> 
                                    <td style="text-align: center;">{{ $per->PERSON_TEL}}</td>                                 
                                    <td style="text-align: center;">{{ $per->ROOM_NAME}}</td> 
                                    <td style="text-align: center;">
                                        <a href="{{ url('person/rent_add/'.$per->PERSON_ID )  }}" class="btn btn-sm btn-info"><i class="fas fa-qrcode"></i></a> 
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#EditModal{{ $per->PERSON_ID}}"><i class="fab fa-btc"></i></button>
                                    </td>
                                    <td style="text-align: center;">                                       
                                        <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $per->PERSON_ID}}"><i class="fas fa-fw fa-edit"></i></button> -->
                                        <a href="{{ url('person/per_edit/'.$per->PERSON_ID )  }}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- <a href="{{ url('person/destroy/'.$per->PERSON_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบผู้เช่าห้อง &nbsp;{{$per->ROOM_NAME}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <button type="button" class="btn btn-sm btn-danger deletePerson"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>
                                </tr>                      

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$per->PERSON_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('Per.per_update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">แก้ไขผู้เช่า</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="form-row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                                        <img src="{{ asset('img/person/' .$per->PERSON_IMG)}}" id="preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
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
                                                            <input value="{{$per->PERSON_FNAME }}" name ="PERSON_FNAME" id="PERSON_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                                                <div class="valid-feedback">
                                                                ชื่อ! 
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationServerPrice">นามสกุล</label>                           
                                                                <input value="{{$per->PERSON_LNAME }}" name ="PERSON_LNAME" id="PERSON_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                                                    <div class="valid-feedback">
                                                                    นามสกุล! 
                                                                    </div>                     
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationServerPrice">สถานะการชำระ</label>                           
                                                                                  
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    
                                                                                                              
                                           
                                            <input type="hidden" value="{{$per->PERSON_ID}}" name ="PERSON_ID" id="PERSON_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
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

<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{ route('Per.per_save') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">เพิ่มผู้เช่า</h4>                   
                    <button class="btn btn-sm btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                </div>
                <div class="modal-body"> 
                    <div class="row push">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                <img src="{{ asset('img/person/dafault.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                            </div>
                            <div class="form-group">
                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="PERSON_IMG" id="PERSON_IMG" class="form-control input-sm" onchange="readURL(this)" required>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">ชื่อ</label>
                                    <input name ="PERSON_FNAME" id="PERSON_FNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback">
                                        ชื่อ! 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">นามสกุล</label>
                                    <input name ="PERSON_LNAME" id="PERSON_LNAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback">
                                        นามสกุล! 
                                        </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">บัตรประชาชน</label>
                                    <input name ="PERSON_CID" id="PERSON_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback">
                                        บัตรประชาชน! 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">เบอร์โทร</label>
                                    <input name ="PERSON_TEL" id="PERSON_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                        <div class="valid-feedback">
                                        เบอร์โทร! 
                                        </div>
                                </div>
                            </div>
                            <div class="form-row">                               
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">ห้อง</label>
                                        <select name="PERSON_ROOM_ID" id="PERSON_ROOM_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                            <option value="">--เลือกห้อง--</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room ->ROOM_ID }}">{{ $room-> ROOM_NAME}}</option>                                           
                                                @endforeach
                                        </select> 
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">ที่อยู่</label>
                                    <textarea name ="PERSON_ADDRESS" id="PERSON_ADDRESS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" rows="5"> </textarea>                           
                                        <div class="valid-feedback">
                                        ที่อยู่! 
                                        </div>
                                </div>                          
                        </div>                                 
                <div class="modal-footer">
                    
                </div>
           </div>
        </form>         
     </div>
 </div>
</div>

<script>
        function switchperson(person){
             
             var checkBox=document.getElementById(person);
             var onoff;

             if (checkBox.checked == true){
               onoff = "True";
         } else {
               onoff = "False";
         }
        //alert(onoff);

        var _token=$('input[name="_token"]').val();
             $.ajax({
                     url:"{{route('setup.person')}}",
                     method:"GET",
                     data:{onoff:onoff,person:person,_token:_token}
             })
             }
</script>
 <script>
        function readURL(input) {
            var fileInput = document.getElementById('PERSON_IMG');
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