@extends('layouts.dash_obt')
{{-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
                                <h4 class="card-title">{{$pageModules->PAGE_LEFT_MODULE_NAME}} </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li> 
                                            <a class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-1" data-toggle="modal" data-target="#rotateInposition" style="color:rgb(253, 251, 251)">เพิ่มหน้าย่อย <i class="ft-plus-circle ml-1" style="color:rgb(253, 251, 251)"></i></a>
                                            <a href="{{url('back_obt/pageleft_module')}}" class="btn btn-m btn-warning box-shadow-2 btn-min-width pull-right mr-1" style="color:rgb(253, 251, 251)">ย้อนกลับ <i class="ft-chevrons-left ml-1" style="color:rgb(253, 251, 251)"></i></a>
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
                                                {{-- <th class="border-top-0">หน้าหลัก</th> --}}
                                                <th class="border-top-0">หน้าย่อย</th>
                                                <th class="border-top-0">รายละเอียด</th>                                               
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($pageModulesubs as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate">{{$key+1}}</td>
                                                    {{-- <td class="text-truncate">{{$u->PAGE_LEFT_MODULE_NAME}}</td> --}}
                                                    <td class="text-truncate">{{$u->PAGE_LEFT_MODULE_SUB_NAME}}</td>
                                                    <td class="text-truncate">{{$u->PAGE_LEFT_MODULE_SUB_DETAIL}}</td>
                                                    <td class="text-truncate">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-truncate"><a href="{{url('back_obt/pageleft_module_sub/'.$u->PAGE_LEFT_MODULE_SUB_ID)}}" class="btn btn-sm btn-primary box-shadow-3 mr-2"><i class="ft-check-circle font-large-1 mr-1" style="color:rgb(253, 251, 251)"></i>เพิ่มหน้าย่อย</a></td>                                               
                                                    <td> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->PAGE_LEFT_MODULE_SUB_ID}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>&nbsp;&nbsp;                                                       
                                                        <a href="{{url('back_obt/pageleft_module_delete/'.$u->PAGE_LEFT_MODULE_SUB_ID)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>&nbsp;&nbsp;
                                                    </td>                                                  
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลหน้าหลัก-->
                                                    <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->PAGE_LEFT_MODULE_SUB_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลหน้าย่อย </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                        <form action="{{ route('obt.pageleft_module_update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf 
                                                            <input type="hidden" id="PAGE_LEFT_MODULE_SUB_ID" name="PAGE_LEFT_MODULE_SUB_ID" value="{{$u->PAGE_LEFT_MODULE_SUB_ID}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>หน้าย่อย : </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <input type="text" placeholder="หน้าย่อย " class="form-control" id="PAGE_LEFT_MODULE_NAME" name="PAGE_LEFT_MODULE_NAME" value="{{$u->PAGE_LEFT_MODULE_NAME}}" required>
                                                                                        <div class="form-control-position">
                                                                                            <i class="ft-layout font-large-1 line-height-1 text-muted icon-align"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                           
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

 <!-- Modal เพิ่มข้อมูลหน้าย่อย-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลหน้าย่อย </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ route('obt.pageleft_module_sub_save') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <input type="text" id="PAGE_LEFT_MODULE_ID" name="PAGE_LEFT_MODULE_ID" value="{{$pageModules->PAGE_LEFT_MODULE_ID}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>หน้าย่อย : </label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" placeholder="หน้าย่อย " class="form-control" id="PAGE_LEFT_MODULE_SUB_NAME" name="PAGE_LEFT_MODULE_SUB_NAME" required>
                            <div class="form-control-position">
                                <i class="ft-layout font-large-1 line-height-1 text-muted icon-align"></i>
                            </div>
                        </div>
                    </div>                           
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <label>รูปประกอบ : </label>
                        <div class="form-group">
                            <img src="{{ asset('app-assets/images/portrait/small/default.jpg')}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:180px; width:220px;">
                        </div>
                        <div class="form-group">
                            <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="addURL(this)" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                        </div>  
                    </div>                           
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <label>รายละเอียด : </label>
                        <div class="form-group position-relative has-icon-left">
                            
                            <textarea class="form-control" id="myeditor" name="myeditor"></textarea>
                            
                        </div>
                    </div>                           
                </div> 
        
            </div>                
            <div class="modal-footer">
                <button type="reset" class="btn grey btn-outline-danger" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                <button type="submit" class="btn btn-outline-info"><i class="ft-save mr-1"></i>Save changes</button>
            </div>
        </form>
        </div>    
    </div>
</div>

    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>
   
    {{-- <script src="{{ asset('ckeditor/jquery.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <script src="{{ asset('ckeditor.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function () {

            CKEDITOR.replace('myeditor',{
                height: 200,
                // filebrowserUploadUrl: "{{asset('/module/upload_ckeditor')}}",
                // filebrowserBrowseUrl: "{{asset('/module/file_browser')}}"
                filebrowserUploadUrl:"{{route('upload', ['_token'=> csrf_token()])}}",
                filebrowserUploadMethod: "form"
            });
        });
    </script>

{{-- <script>
    CKEDITOR.replace( 'editor1' );
</script> --}}
@endsection

