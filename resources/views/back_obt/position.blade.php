@extends('layouts.dash_obt')

{{-- {{session('LogedUser')}} --}}

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
                                <h4 class="card-title">รายการตำแหน่ง</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>   
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มตำแหน่ง <i class="ft-plus-circle ml-1"></i>
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
                                                <th class="border-top-0">ตำแหน่ง</th>                                              
                                                <th class="border-top-0" width="15%;">วันที่</th>
                                                <th class="border-top-0" width="5%;">เปิดใช้งาน</th>                                               
                                                <th class="border-top-0" width="5%;">แก้ไข</th>
                                                <th class="border-top-0" width="5%;">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            @foreach ($posits as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate" width="5%;">{{$key+1}}</td>
                                                    <td class="text-padding">{{$u->POSIT_NAME}}</td>                                                  
                                                    <td class="text-padding" width="15%;">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-padding">
                                                        <div class="float-left"> 
                                                            @if($u-> status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> POSIT_ID }}" name="{{ $u-> POSIT_ID }}" data-color="info" onchange="switcposition({{ $u-> POSIT_ID }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> POSIT_ID }}" name="{{ $u-> POSIT_ID }}" data-color="info" onchange="switcposition({{ $u-> POSIT_ID }});" >
                                                            @endif
                                                        </div>
                                                    </td>                                                                                                
                                                    <td width="5%;"> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->POSIT_ID}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>
                                                      
                                                    </td> 
                                                    <td width="5%;">   
                                                        <a href="{{url('back_obt/position_delete/'.$u->POSIT_ID)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                    </td>  
                                                   
                                                </tr>
                                             
                                                    <!-- Modal แก้ไขข้อมูลตำแหน่ง-->
                                                    <div class="modal animated rotateInDownLeft text-left" id="rotateInDownRight{{$u->POSIT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-warning ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลตำแหน่ง </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('obt.position_update') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf 
                                                                    <input type="hidden" id="POSIT_ID" name="POSIT_ID" value="{{$u->POSIT_ID}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label>ตำแหน่ง : </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="ตำแหน่ง " class="form-control" id="POSIT_NAME" name="POSIT_NAME" value="{{$u->POSIT_NAME}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                  
                                                                    </div>   
                                                                </div>
                                                                    <hr>
                                                                <div class="modal-footer">
                                                                    <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                                                                <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
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

 <!-- Modal เพิ่มข้อมูลตำแหน่ง-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลตำแหน่ง </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('obt.position_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <label>ตำแหน่ง : </label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" placeholder="ตำแหน่ง " class="form-control" id="POSIT_NAME" name="POSIT_NAME" required>
                            <div class="form-control-position">
                                <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                            </div>
                        </div>
                    </div>                                  
                </div>   
            </div>
                <hr>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal"><i class="ft-power mr-1"></i>Close</button>
                <button type="submit" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1"><i class="ft-save mr-1"></i>Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>

    @endsection
    @section('footer')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/vendors/js/material-vendors.min.js') }}"></script> --}}
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
        function switcposition(position){
            var checkBox=document.getElementById(position);
            var onoff;

            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('obt.switchactive_position')}}",
                        method:"GET",
                        data:{onoff:onoff,position:position,_token:_token}
                })
             }
       </script>
@endsection

