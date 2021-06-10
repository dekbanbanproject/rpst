@extends('layouts.dash_products')
<link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" />
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
    function Removeformate($strDate)
    {
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("m",strtotime($strDate));
    $strDay= date("d",strtotime($strDate));  
    return $strDay."/".$strMonth."/".$strYear;
    }
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d');
    use App\Http\Controllers\ConfigController;  
?>

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Appointment Table -->
                <div class="row match-height">                    
                    <div id="recent-appointments" class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">รายการสินค้า</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            {{-- <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="hospital-book-appointment.html" target="_blank">View all</a> --}}
                                            {{-- <button type="button" class="btn btn-m btn-primary box-shadow-2 btn-min-width pull-right" data-toggle="modal" data-target="#rotateIn">เพิ่มบุคลากร <i class="ft-plus-circle ml-1"></i>&nbsp;&nbsp; --}}
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มสินค้า <i class="ft-plus-circle ml-1"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">ลำดับ</th>
                                                <th class="border-top-0">Icode</th>
                                                <th class="border-top-0">รูปภาพ</th>
                                                <th class="border-top-0">รายการสินค้า</th>
                                                <th class="border-top-0">รับ</th>
                                                <th class="border-top-0">เบิก-จ่าย</th>
                                                <th class="border-top-0">จ่าย(Hosxp)</th>
                                                <th class="border-top-0">คงเหลือ</th>
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($pros as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate">{{$key+1}}</td>
                                                    <td class="text-truncate">{{$u->PRO_CODE}}</td>
                                                    <td class="text-truncate"><img src="data:image/png;base64,{{ chunk_split(base64_encode($u->PRO_PIC)) }}" alt="Image" class="img-thumbnail" style="height:60px; width:70px;"></td>
                                                    <td class="text-truncate">{{$u->PRO_NAME}}</td>   
                                                    <td class="text-truncate"></td>     
                                                    <td class="text-truncate"></td>  
                                                    <td class="text-truncate"></td>  
                                                    <td class="text-truncate"></td>                                              
                                                    <td> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->PRO_ID}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>&nbsp;&nbsp;                                                       
                                                        <a href="{{url('setting/products_delete/'.$u->PRO_ID)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>&nbsp;&nbsp;
                                                    </td>                                                  
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลสินค้า-->
                                                    <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->PRO_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลสินค้า</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            <form action="{{ route('per.products_update') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf 
                                                                <input type="hidden" id="PRO_ID" name="PRO_ID" value="{{$u->PRO_ID}}">
                                                                    <div class="modal-body">   
                                                                        <div class="row">
                                                                            <div class="form-group col-4 mb-2">
                                                                                <div class="form-group">
                                                                                    @if ($u->PRO_PIC == '')
                                                                                    {{-- <img src="{{ asset('img/logo/logod.png') }}" id="" alt="Image" class="img-thumbnail" style="height:180px; width:220px;"> --}}
                                                                                    <img src="{{ asset('app-assets/images/portrait/small/default.jpg')}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:180px; width:220px;">
                                                                                    @else
                                                                                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($u->PRO_PIC))}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:180px; width:220px;">
                                                                                    @endif
                                                                                   
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="addURL(this)" >
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                                                                </div>                                           
                                                                            </div>
                                                                            
                                                                            <div class="form-group col-8 mb-2">                                                
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label>CODE: </label>
                                                                                        <div class="form-group position-relative has-icon-left">
                                                                                            <input type="text" placeholder="CODE" class="form-control" id="PRO_CODE" name="PRO_CODE" value="{{$u->PRO_CODE}}" required>                                   
                                                                                        </div>
                                                                                    </div>  
                                                                                    <div class="col-md-12">
                                                                                        <label>รายการสินค้า: </label>
                                                                                        <div class="form-group position-relative has-icon-left">
                                                                                            <input type="text" placeholder="รายการสินค้า" class="form-control" id="PRO_NAME" name="PRO_NAME" value="{{$u->PRO_NAME}}" required>                                   
                                                                                        </div>
                                                                                    </div>                     
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <label>จำนวน: </label>
                                                                                        <div class="form-group position-relative has-icon-left">
                                                                                            <input type="text" placeholder="จำนวน" class="form-control" id="PRO_QTY" name="PRO_QTY" value="{{$u->PRO_QTY}}" required>                                   
                                                                                        </div>
                                                                                    </div>  
                                                                                    <div class="col-md-7">
                                                                                        <label>หน่วยนับ: </label>
                                                                                        <div class="form-group position-relative has-icon-left">
                                                                                            <select name="PRO_UNIT" id="PRO_UNIT" class="form-control" required>
                                                                                                <option value="">-เลือก-</option>
                                                                                                @foreach ($units as $s)   
                                                                                                @if ($u->PRO_UNIT == $s->UNITS_ID)
                                                                                                <option value="{{ $s->UNITS_ID }}" selected> {{ $s->UNITS_NAME }}</option> 
                                                                                                @else
                                                                                                <option value="{{ $s->UNITS_ID }}" > {{ $s->UNITS_NAME }}</option> 
                                                                                                @endif                                       
                                                                                                                                                 
                                                                                                @endforeach
                                                                                            </select>                                  
                                                                                        </div>
                                                                                    </div>                     
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>หมวดหมู่: </label>
                                                                                <div class="form-group position-relative has-icon-left">  
                                                                                    <select name="PRO_CAT" id="PRO_CAT" class="form-control" required>
                                                                                        <option value="">-เลือก-</option>
                                                                                        @foreach ($cats as $c)   
                                                                                        @if ($u->PRO_CAT == $c->CAT_ID)
                                                                                        <option value="{{ $c->CAT_ID }}" selected> {{ $c->CAT_NAME }}</option> 
                                                                                        @else
                                                                                        <option value="{{ $c->CAT_ID }}" > {{ $c->CAT_NAME }}</option> 
                                                                                        @endif                                       
                                                                                                                                        
                                                                                        @endforeach
                                                                                    </select>                                    
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-md-6">
                                                                                <label>ราคา: </label>
                                                                                <div class="form-group position-relative has-icon-left">
                                                                                    <input type="text" placeholder="ราคา" class="form-control" id="PRO_PRICE" name="PRO_PRICE" value="{{$u->PRO_PRICE}}">                                   
                                                                                </div>
                                                                            </div> 
                                                                        </div> 
                                                                    </div>
                                                            
                                                                        
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn grey btn-outline-danger" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                        <button type="submit" class="btn btn-outline-info"><i class="ft-save mr-1"></i>Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                <!-- Appointment Table Ends -->

            </div>
        </div>
    </div>
  </div>
  <!-- END: Content-->

 <!-- Modal เพิ่มข้อมูลรายการสินค้า-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลสินค้า</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ route('per.products_save') }}" method="POST" enctype="multipart/form-data">
            @csrf 

                <div class="modal-body">   
                    <div class="row">
                        <div class="form-group col-4 mb-2">
                            <div class="form-group">
                                <img src="{{ asset('app-assets/images/portrait/small/default.jpg')}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:180px; width:220px;">
                            </div>
                            <div class="form-group">
                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="addURL(this)" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                            </div>                                           
                        </div>
                        
                        <div class="form-group col-8 mb-2">                                                
                            <div class="row">
                                <div class="col-md-12">
                                    <label>CODE: </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" placeholder="CODE" class="form-control" id="PRO_CODE" name="PRO_CODE" required>                                   
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <label>รายการสินค้า: </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" placeholder="รายการสินค้า" class="form-control" id="PRO_NAME" name="PRO_NAME" required>                                   
                                    </div>
                                </div>                     
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>จำนวน: </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" placeholder="จำนวน" class="form-control" id="PRO_QTY" name="PRO_QTY" required>                                   
                                    </div>
                                </div>  
                                <div class="col-md-7">
                                    <label>หน่วยนับ: </label>
                                    <div class="form-group position-relative has-icon-left">
                                        <select name="PRO_UNIT" id="PRO_UNIT" class="form-control" required>
                                            <option value="">-เลือก-</option>
                                            @foreach ($units as $s)                                          
                                                    <option value="{{ $s->UNITS_ID }}" > {{ $s->UNITS_NAME }}</option>                                          
                                            @endforeach
                                        </select>                                  
                                    </div>
                                </div>                     
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>หมวดหมู่: </label>
                            <div class="form-group position-relative has-icon-left">  
                                <select name="PRO_CAT" id="PRO_CAT" class="form-control" required>
                                    <option value="">-เลือก-</option>
                                    @foreach ($cats as $c)                                          
                                            <option value="{{ $c->CAT_ID }}" > {{ $c->CAT_NAME }}</option>                                          
                                    @endforeach
                                </select>                                    
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <label>ราคา: </label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" placeholder="ราคา" class="form-control" id="PRO_PRICE" name="PRO_PRICE" >                                   
                            </div>
                        </div> 
                    </div> 
                </div>
        
                    
                <div class="modal-footer">
                    <button type="reset" class="btn grey btn-outline-danger" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-outline-info"><i class="ft-save mr-1"></i>Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>

<script>
    $(document).ready(function() {
            $('select').select2({
            width: '100%'
        });
    });
</script>

<script>
    function addURL(input) {
        var fileInput = document.getElementById('img');
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#add_preview').attr('src', e.target.result);
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

