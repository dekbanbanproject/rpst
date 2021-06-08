@extends('layouts.dash_main')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายการยา</h1>
        <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มรายการยา</a>
        &nbsp;&nbsp;<a href="{{ url('products/pdf/productspdf')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> Print</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการยา</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ลำดับ</th>                           
                            <th style="text-align: center;">icode</th> 
                            <th style="text-align: center;">รูปภาพ</th>  
                            <th style="text-align: center;">รายการยา</th>  
                            <th style="text-align: center;">จำนวน</th> 
                            <th style="text-align: center;">หน่วยนับ</th> 
                            <th style="text-align: center;">ราคา</th> 
                            <th style="text-align: center;">หมวดหมู่</th>                                                                                                                     
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($Pros as $Pro)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <!-- <td style="text-align: center;">{{$Pro->PRO_CODE}}<img src="data:image/png;base64,{{base64_encode($Pro->PRO_CODE)}}"></td>     -->
                                    <td style="text-align: center;">{{$Pro->PRO_CODE}}<?php echo DNS1D::getBarcodeHTML($Pro->PRO_CODE, 'C128');  ?></td> 
                                    <td style="text-align: center;"><img src="{{ asset('img/product/' .$Pro->PRO_PIC)}}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"></td>
                                    <td style="text-align: center;">{{ $Pro->PRO_NAME}}</td>
                                    <td style="text-align: center;">{{ $Pro->PRO_QTY}}</td> 
                                    <td style="text-align: center;">{{ $Pro->UNITS_NAME}}</td>
                                    <td style="text-align: center;">{{ number_format($Pro->PRO_PRICE,2)}}</td>
                                    <td style="text-align: center;">{{ $Pro->CAT_NAME}}</td>     
                                    <td style="text-align: center;"><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $Pro->PRO_ID}}"><i class="fas fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $Pro->PRO_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $Pro->PRO_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/products/destroy/'.$Pro->PRO_ID )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>                      

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$Pro->PRO_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('P.updateproducts') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">Edit Products</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit">Edit </button>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="row push">
                                                <div class="col-lg-4">

                                                    </div>
                                                <div class="col-lg-4">
                                                        <div class="form-group">
                                                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                                                <img src="{{ asset('img/product/' .$Pro->PRO_PIC)}}" id="image_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                                            </div>
                                                        <div class="form-group">
                                                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="PRO_PIC" id="PRO_PIC" class="form-control input-sm" onchange="Changpic(this)">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        </div>
                                                </div>
                                                <script>
                                                        function Changpic(input) {
                                                            var fileInput = document.getElementById('PRO_PIC');
                                                            var url = input.value;
                                                            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                                                                    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                                                                        var reader = new FileReader();

                                                                        reader.onload = function (e) {
                                                                            $('#image_upload_preview').attr('src', e.target.result);
                                                                        }
                                                                        reader.readAsDataURL(input.files[0]);
                                                                    }else{

                                                                                alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                                                                                fileInput.value = '';
                                                                                return false;
                                                                        }
                                                                }
                                                    </script>
                                                    <div class="col-lg-4">

                                                    </div>
                                                </div>                  
                                                <div class="row push">                                                                              
                                                    <div class="col-md-2 text-right"> Icode :  </div>
                                                    <div class="col-md-4">                            
                                                        <input value="{{$Pro->PRO_CODE}}" name ="PRO_CODE" id="PRO_CODE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                    </div> 
                                                    <div class="col-md-2 text-right"> รายการยา : </div>  
                                                    <div class="col-md-4">
                                                        <input value="{{$Pro->PRO_NAME}}" name ="PRO_NAME" id="PRO_NAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                                    </div>  
                                                </div>
                                                <br>
                                                <div class="row push">                                                                              
                                                    <div class="col-md-2 text-right"> จำนวน :  </div>
                                                    <div class="col-md-4">                            
                                                        <input value="{{$Pro->PRO_QTY}}" name ="PRO_QTY" id="PRO_QTY" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                                                    </div> 
                                                    <div class="col-md-2 text-right"> ราคา:  </div>  
                                                    <div class="col-md-4">
                                                        <input value="{{$Pro->PRO_PRICE}}" name ="PRO_PRICE" id="PRO_PRICE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                                    </div>  
                                                </div>
                                                <br>
                                                <div class="row push"> 
                                                    <div class="col-md-2 text-right"> หน่วยนับ :  </div>  
                                                    <div class="col-md-4">
                                                        <select name="PRO_UNIT" id="PRO_UNIT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                                            <option value="">--เลือกหน่วยนับ--</option>
                                                                @foreach ($units as $unit)
                                                                    @if($unit ->UNITS_ID == $Pro->PRO_UNIT )
                                                                        <option value="{{ $unit ->UNITS_ID }}"selected>{{ $unit-> UNITS_NAME}}</option>
                                                                    @else
                                                                        <option value="{{ $unit ->UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>
                                                                    @endif
                                                                @endforeach
                                                        </select>                                                    
                                                    </div>  
                                                    <div class="col-md-2 text-right">หมวดหมู่ : </div>  
                                                    <div class="col-md-4">                                                      
                                                        <select name="PRO_CAT" id="PRO_CAT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                                            <option value="">--เลือกหมวดหมู่--</option>
                                                                @foreach ($CATS as $CAT)
                                                                    @if($CAT ->CAT_ID == $Pro->PRO_CAT )
                                                                        <option value="{{ $CAT ->CAT_ID }}"selected>{{ $CAT-> CAT_NAME}}</option>
                                                                    @else
                                                                        <option value="{{ $CAT ->CAT_ID }}">{{ $CAT-> CAT_NAME}}</option>
                                                                    @endif
                                                                @endforeach
                                                        </select> 
                                                    </div>                          
                                                </div> 
                                            <br>
                                            <input type="hidden" value="{{$Pro->PRO_ID}}" name ="PRO_ID" id="PRO_ID" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;"> 
                                       
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
            <form action="{{ route('P.saveproducts') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">Add Products</h4>                   
                    <button class="btn btn-sm btn-info" type="submit">Add </button>
                </div>
                <div class="modal-body"> 
                <div class="row push">
                                <div class="col-lg-4">

                                    </div>

                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                                <img src="{{ asset('img/camera.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:270px;">
                                        </div>
                                        <div class="form-group">
                                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="PRO_PIC" id="PRO_PIC" class="form-control input-sm" onchange="readURL(this)" required>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>

                                        </div>
                                </div>
                                                <script>
                                                            function readURL(input) {
                                                                var fileInput = document.getElementById('PRO_PIC');
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
                                <div class="col-lg-4">

                                    </div>
                                </div>
                            <br>
                    <div class="row push">                                                                              
                        <div class="col-md-2 text-right">Icode :</div>
                            <div class="col-md-4">                            
                                <input name ="PRO_CODE" id="PRO_CODE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                            </div> 
                            <div class="col-md-2 text-right">
                                รายการยา : 
                            </div>  
                            <div class="col-md-4">
                                <input name ="PRO_NAME" id="PRO_NAME" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                            </div>  
                        </div>
                        <br>
                        <div class="row push">                                                                              
                            <div class="col-md-2 text-right">จำนวน : </div>
                            <div class="col-md-4">                            
                                <input name ="PRO_QTY" id="PRO_QTY" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">                            
                            </div> 
                            <div class="col-md-2 text-right"> ราคา: </div>  
                            <div class="col-md-4">
                                <input name ="PRO_PRICE" id="PRO_PRICE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                            </div>  
                        </div>
                        <br>
                        <div class="row push"> 
                            <div class="col-md-2 text-right"> หน่วยนับ : </div>  
                            <div class="col-md-4">
                                <select name="PRO_UNIT" id="PRO_UNIT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                                    <option value="">--เลือกหน่วยนับ--</option>
                                        @foreach ($units as $unit)                                            
                                            <option value="{{ $unit ->UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>                                            
                                        @endforeach
                                </select>   
                               
                            </div>  
                            <div class="col-md-2 text-right"> หมวดหมู่ :  </div>  
                            <div class="col-md-4">
                                <select name="PRO_CAT" id="PRO_CAT" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                                    <option value="">--เลือกหมวดหมู่--</option>
                                        @foreach ($CATS as $CAT)
                                            <option value="{{ $CAT ->CAT_ID }}">{{ $CAT-> CAT_NAME}}</option>                                           
                                        @endforeach
                                </select>                               
                            </div>                          
                        </div> 
                    <br>
                <div class="modal-footer">
                    
                </div>
           </div>
        </form>         
     </div>
 </div>
</div>









@endsection