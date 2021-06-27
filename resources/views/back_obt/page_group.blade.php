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
                                <h4 class="card-title">รายการหมวดหมู่</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>                                           
                                            {{-- <a href="{{url('back_obt/pageleft_module_add')}}" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2">เพิ่มหมวดหมู่ <i class="ft-plus-circle ml-1"></i></a> --}}
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มหมวดหมู่ <i class="ft-plus-circle ml-1"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered sourced-data" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" width="5%;">ลำดับ</th>
                                                <th class="border-top-0">หมวดหมู่</th>                                              
                                                <th class="border-top-0" width="15%;">วันที่</th>
                                                <th class="border-top-0" width="5%;">เปิดใช้งาน</th>                                               
                                                <th class="border-top-0" width="5%;">แก้ไข</th>
                                                <th class="border-top-0" width="5%;">ลบ</th>
                                                {{-- <th class="border-top-0" width="5%;">หน้าหลัก</th>  --}}
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            @foreach ($pagegroups as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate" width="5%;">{{$key+1}}</td>
                                                    <td class="text-padding">{{$u->group_name}}</td>                                                  
                                                    <td class="text-padding" width="15%;">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-padding">
                                                        <div class="float-left"> 
                                                            @if($u-> status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> group_id }}" name="{{ $u-> group_id }}" data-color="info" onchange="switcgroup({{ $u-> group_id }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> group_id }}" name="{{ $u-> group_id }}" data-color="info" onchange="switcgroup({{ $u-> group_id }});" >
                                                            @endif
                                                        </div>
                                                    </td>                                                                                                
                                                    <td width="5%;"> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->group_id}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>
                                                        {{-- <a href="{{url('back_obt/pageleft_module_edit/'.$u->group_id)}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>                                                       --}}
                                                    </td> 
                                                    <td width="5%;">   
                                                        <a href="{{url('back_obt/page_group_delete/'.$u->group_id)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                    </td>  
                                                    {{-- <td class="text-padding" width="5%;"><a href="{{url('back_obt/pageleft_module_sub/'.$u->group_id)}}" ><i class="la la-copy font-large-1" style="color:rgb(204, 4, 230)"></i></a></td>                                                   --}}
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลหน้าหลัก-->
                                                    <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->group_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลหน้าหลัก </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                        <form action="{{ route('obt.page_group_update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf 
                                                            <input type="hidden" id="group_id" name="group_id" value="{{$u->group_id}}">
                                                                <div class="modal-body">                                                                  
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label>หมวดหมู่ : </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="หมวดหมู่ " class="form-control" id="group_name" name="group_name" value="{{$u->group_name}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>     
                                                                    </div>                                                                       
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <fieldset class="form-group position-relative ">
                                                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">ตำแหน่งวาง</label>
                                                                                <select class="form-control" id="layout_id" name="layout_id" required>
                                                                                        <option value="">--กรุณาเลือก--</option>
                                                                                        @foreach ($lays as $l)
                                                                                        @if ($u->layout_id == $l->layout_id)
                                                                                        <option value="{{$l->layout_id}}" selected>{{$l->layout_name}}</option>
                                                                                        @else
                                                                                        <option value="{{$l->layout_id}}">{{$l->layout_name}}</option>
                                                                                        @endif
                                                                                            
                                                                                        @endforeach
                                                                                </select>                                       
                                                                            </fieldset>                                                                            
                                                                        </div>                            
                                                                    </div>                       
                                                                </div>                                       
                                                                   
                                                                <hr>
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

 <!-- Modal เพิ่มข้อมูลหมวดหมู่-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลหมวดหมู่ </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('obt.page_group_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>หมวดหมู่ : </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="หมวดหมู่ " class="form-control" id="group_name" name="group_name" required>
                                    <div class="form-control-position">
                                        <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                                    </div>
                                </div>
                            </div>                            
                       </div>                       
                    </div>                                       
                </div>     
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group position-relative ">
                                    <label for="" style="font-size:19px;color:rgb(63, 37, 179)">ตำแหน่งวาง</label>
                                    <select class="form-control" id="layout_id" name="layout_id" required>
                                            <option value="">--กรุณาเลือก--</option>
                                            @foreach ($lays as $l)
                                                <option value="{{$l->layout_id}}">{{$l->layout_name}}</option>
                                            @endforeach
                                    </select>                                       
                                </fieldset>
                               
                            </div>                            
                       </div>                       
                    </div>                                       
                </div>               
            </div>
                <hr>
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
        function switcgroup(group){
            var checkBox=document.getElementById(group);
            var onoff;

            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('obt.switchactive_group')}}",
                        method:"GET",
                        data:{onoff:onoff,group:group,_token:_token}
                })
             }
       </script>
@endsection

