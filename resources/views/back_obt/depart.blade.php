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
                                <h4 class="card-title">รายการแผนก</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>   
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มแผนก <i class="ft-plus-circle ml-1"></i>
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
                                                <th class="border-top-0">แผนก</th>   
                                                <th class="border-top-0">Line Token</th>                                            
                                                <th class="border-top-0" width="15%;">วันที่</th>
                                                <th class="border-top-0" width="5%;">เปิดใช้งาน</th>                                               
                                                <th class="border-top-0" width="5%;">แก้ไข</th>
                                                <th class="border-top-0" width="5%;">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            @foreach ($deps as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate" width="5%;">{{$key+1}}</td>
                                                    <td class="text-padding">{{$u->departs_name}}</td>  
                                                    <td class="text-padding">{{$u->departs_token}}</td>                                                
                                                    <td class="text-padding" width="15%;">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-padding">
                                                        <div class="float-left"> 
                                                            @if($u-> status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> departs_id }}" name="{{ $u-> departs_id }}" data-color="info" onchange="switcdepart({{ $u-> departs_id }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> departs_id }}" name="{{ $u-> departs_id }}" data-color="info" onchange="switcdepart({{ $u-> departs_id }});" >
                                                            @endif
                                                        </div>
                                                    </td>                                                                                                
                                                    <td width="5%;"> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->departs_id}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>
                                                      
                                                    </td> 
                                                    <td width="5%;">   
                                                        <a href="{{url('back_obt/depart_delete/'.$u->departs_id)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                    </td>  
                                                   
                                                </tr>
                                     
                                                    <!-- Modal แก้ไขข้อมูลตำแหน่ง-->
                                                    <div class="modal animated rotateInDownLeft text-left" id="rotateInDownRight{{$u->departs_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-warning ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลแผนก </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('obt.depart_update') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf 
                                                                    <input type="hidden" id="departs_id" name="departs_id" value="{{$u->departs_id}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label>แผนก : </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="แผนก " class="form-control" id="departs_name" name="departs_name" value="{{$u->departs_name}}" required>
                                                                                <div class="form-control-position">
                                                                                    <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div>  
                                                                    <div class="row"> 
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label>Line Token : </label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input type="text" placeholder="Line Token " class="form-control" id="departs_token" name="departs_token" value="{{$u->departs_token}}" required>
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

 <!-- Modal เพิ่มข้อมูลแผนก-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลแผนก </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('obt.depart_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <label>แผนก : </label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" placeholder="แผนก " class="form-control" id="departs_name" name="departs_name" required>
                            <div class="form-control-position">
                                <i class="la la-tag font-large-0 line-height-1 text-muted icon-align mr-1"></i>
                            </div>
                        </div>
                    </div>                                  
                </div>
                <div class="row"> 
                    <div class="form-group col-12 mb-2">
                        <label>Line Token : </label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" placeholder="Line Token " class="form-control" id="departs_token" name="departs_token" >
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

  
    <script>
        function switcdepart(depart){
            var checkBox=document.getElementById(depart);
            var onoff;

            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('obt.switchactive_depart')}}",
                        method:"GET",
                        data:{onoff:onoff,depart:depart,_token:_token}
                })
             }
       </script>
@endsection

