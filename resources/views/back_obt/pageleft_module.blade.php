@extends('layouts.dash_obt')

@section('content')
<?php

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
                                <h4 class="card-title">รายการหน้าหลัก </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>                                           
                                            <a href="{{url('back_obt/pageleft_module_add')}}" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2">เพิ่มหน้าหลัก <i class="ft-plus-circle ml-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    {{-- <table id="recent-orders-doctors" class="table table-hover table-xl mb-0"> --}}
                                        <table id="example" class="table table-striped table-bordered sourced-data" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" width="5%;">ลำดับ</th>
                                                <th class="border-top-0">หน้าหลัก</th>                                              
                                                <th class="border-top-0" width="15%;">วันที่</th>
                                                <th class="border-top-0" width="5%;">เปิดใช้งาน</th>                                               
                                                <th class="border-top-0" width="5%;">แก้ไข</th>
                                                <th class="border-top-0" width="5%;">ลบ</th>
                                                {{-- <th class="border-top-0" width="5%;">หน้าย่อย</th>  --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($pageModules as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate" width="5%;">{{$key+1}}</td>
                                                    <td class="text-padding">{!!$u->module_name!!}</td>                                                  
                                                    <td class="text-padding" width="15%;">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-padding">
                                                        <div class="float-left"> 
                                                            @if($u-> status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> module_id }}" name="{{ $u-> module_id }}" data-color="info" onchange="switcmodule({{ $u-> module_id }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> module_id }}" name="{{ $u-> module_id }}" data-color="info" onchange="switcmodule({{ $u-> module_id }});" >
                                                            @endif
                                                        </div>
                                                    </td>                                                                                                
                                                    <td width="5%;"> 
                                                        {{-- <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->module_id}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a> --}}
                                                        <a href="{{url('back_obt/pageleft_module_edit/'.$u->module_id)}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>                                                      
                                                    </td> 
                                                    <td width="5%;">   
                                                        <a href="{{url('back_obt/pageleft_module_delete/'.$u->module_id)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                    </td>  
                                                    {{-- <td class="text-padding" width="5%;"><a href="{{url('back_obt/pageleft_module_sub/'.$u->module_id)}}" ><i class="la la-copy font-large-1" style="color:rgb(169, 230, 4)"></i></a></td>                                                   --}}
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลหน้าหลัก-->
                                                    {{-- <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->module_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลหน้าหลัก </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                        <form action="{{ route('obt.pageleft_module_update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf 
                                                            <input type="hidden" id="module_id" name="module_id" value="{{$u->module_id}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>หน้าหลัก : </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <input type="text" placeholder="หน้าหลัก " class="form-control" id="module_name" name="module_name" value="{{$u->module_name}}" required>
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
                                                    </div> --}}

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

 <!-- Modal เพิ่มข้อมูลหน้าหลัก-->
 {{-- <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลหน้าหลัก </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('obt.pageleft_module_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>หน้าหลัก : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="หน้าหลัก " class="form-control" id="module_name" name="module_name" required>
                                    <div class="form-control-position">
                                        <i class="ft-layout font-large-1 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <label>รายละเอียด : </label>
                                <div class="form-group ">
                                    <textarea class="form-control" id="summary-ckeditor" name="summary_ckeditor"></textarea>                              
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
</div> --}}

    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/material-vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>
    

    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            height: 200,
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        </script>
    <script>
        function switcmodule(module){
            var checkBox=document.getElementById(module);
            var onoff;

            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('obt.switchactive_module')}}",
                        method:"GET",
                        data:{onoff:onoff,module:module,_token:_token}
                })
             }
       </script>
@endsection

