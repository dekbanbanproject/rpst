@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายชื่อผู้ไห้เช่า</h1>
        <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;&nbsp; เพิ่มผู้ไห้เช่า</a>
       
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายชื่อผู้ไห้เช่า</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="3%">ลำดับ</th> 
                            <th style="text-align: center;">CID</th> 
                            <th style="text-align: center;" width="8%">รูปภาพ</th>  
                            <th style="text-align: center;">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;">ที่อยู่</th> 
                            <th style="text-align: center;"width="10%">เบอร์โทร</th>                                                                                                                                                                 
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($ooners as $ooner)
                            <?php $number++;  ?>
                                <tr>
                                    <input type="hidden" class="deleteID" value="{{ $ooner->OWNER_ID }}">
                                    <td style="text-align: center;">{{ $number}}</td>   
                                    <td style="text-align: center;">{{$ooner->OWNER_CID}}<?php echo DNS1D::getBarcodeHTML($ooner->OWNER_CID, 'C128');  ?></td> 
                                    <!-- <td style="text-align: center;"><img src="{{ asset('img/person/' .$ooner->OWNER_LOGO)}}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"></td> -->
                                    
                                   <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($ooner->OWNER_LOGO)) }}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"> </td>
                                    <td style="text-align: center;">{{ $ooner->OWNER_NAME}}</td>
                                    <td style="text-align: center;">{{ $ooner->OWNER_ADDRESS}}</td> 
                                    <td style="text-align: center;">{{ $ooner->OWNER_TEL}}</td>                                 
     
                                    <td style="text-align: center;">
                                        <!-- <a href="{{ url('person/rent_add/'.$ooner->OWNER_ID )  }}" class="btn btn-sm btn-info"><i class="fas fa-qrcode"></i></a>  -->
                                        <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#EditModal{{ $ooner->OWNER_ID}}"><i class="fab fa-btc"></i></button> -->
                                       <a href="{{ url('person/owneredit/'.$ooner->OWNER_ID )  }}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- <a href="{{ url('person/destroy/'.$ooner->OWNER_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบผู้เช่าห้อง &nbsp;{{$ooner->OWNER_NAME}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <button type="button" class="btn btn-sm btn-danger deleteOwner"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>
                                </tr>                      

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$ooner->OWNER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="#" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                                                        <img src="{{ asset('img/person/' .$ooner->OWNER_LOGO)}}" id="preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <input style="font-family: 'Kanit', sans-serif;" type="file" name="OWNER_LOGO" id="OWNER_LOGO" class="form-control input-sm" onchange="readURL(this)">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </div>
                                                </div>                                               
                                                <div class="col-sm-8">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationServer01">ชื่อ</label>
                                                            <input value="{{$ooner->OWNER_NAME }}" name ="OWNER_NAME" id="OWNER_NAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                                                <div class="valid-feedback">
                                                                ชื่อ! 
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationServerPrice">นามสกุล</label>                           
                                                                <input value="{{$ooner->OWNER_ADDRESS }}" name ="OWNER_ADDRESS" id="OWNER_ADDRESS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
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
                                                    
                                                                                                              
                                           
                                            <input type="hidden" value="{{$ooner->OWNER_ID}}" name ="OWNER_ID" id="OWNER_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
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
            <form action="{{route('OW.save')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">เพิ่มผู้ไห้เช่า</h4>                   
                    <button class="btn btn-sm btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                    <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                    <img src="{{ asset('img/person/dafault.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                </div>
                                <div class="form-group">
                                    <input style="font-family: 'Kanit', sans-serif;" type="file" name="OWNER_LOGO" id="OWNER_LOGO" class="form-control input-sm" onchange="readURL(this)" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="invalid-feedback">กรุณาเลือกภาพ</div>

                                </div>
                        </div>                                               
                        <div class="col-sm-8">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">ชื่อ-นามสกุล</label>
                                    <input  name ="OWNER_NAME" id="OWNER_NAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" > 
                                        <div class="valid-feedback">
                                        ชื่อ-นามสกุล! 
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">เบอร์โทร</label>
                                    <input  name ="OWNER_TEL" id="OWNER_TEL" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" > 
                                        <div class="valid-feedback">
                                        เบอร์โทร! 
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">เลขผู้เสียภาษี</label>
                                    <input  name ="OWNER_CID" id="OWNER_CID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" > 
                                        <div class="valid-feedback">
                                        เลขผู้เสียภาษี! 
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">ที่อยู่</label>
                                    <textarea  name ="OWNER_ADDRESS" id="OWNER_ADDRESS" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" row="6"></textarea> 
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
            var fileInput = document.getElementById('OWNER_LOGO');
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