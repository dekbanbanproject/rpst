@extends('layouts.dash_obt')

@section('content')
<?php
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
                                <h4 class="card-title">รายการร้องเรียน </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered sourced-data" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" width="5%;">ลำดับ</th>
                                                <th class="border-top-0">ชื่อเรื่อง</th>   
                                                <th class="border-top-0">รายละเอียด</th> 
                                                <th class="border-top-0" width="10%;">อีเมล์</th>    
                                                <th class="border-top-0" width="10%;">เบอร์โทร</th>                                          
                                                <th class="border-top-0" width="10%;">วันที่</th>
                                                <th class="border-top-0" width="5%;">เปิดใช้งาน</th>                                               
                                                {{-- <th class="border-top-0" width="5%;">แก้ไข</th> --}}
                                                <th class="border-top-0" width="5%;">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($cons as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate" width="5%;">{{$key+1}}</td>
                                                    <td class="text-padding">{!!$u->con_name!!}</td>    
                                                    <td class="text-padding" >{!!$u->con_message!!}</td>  
                                                    <td class="text-padding" >{!!$u->con_email!!}</td>  
                                                    <td class="text-padding" width="10%;">{!!$u->con_tel!!}</td>                                               
                                                    <td class="text-padding" width="10%;">{{Datethai($u->updated_at)}}</td>
                                                    <td class="text-padding" width="5%;">
                                                        <div class="float-left" > 
                                                            @if($u-> status == 'true' )
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> con_id }}" name="{{ $u-> con_id }}" data-color="info" onchange="switccontacts({{ $u-> con_id }});" checked>
                                                            @else
                                                                <input type="checkbox" class="switchery" data-size="sm" id="{{ $u-> con_id }}" name="{{ $u-> con_id }}" data-color="info" onchange="switccontacts({{ $u-> con_id }});" >
                                                            @endif
                                                        </div>
                                                    </td>                                                                                                
                                                    {{-- <td width="5%;"> 
                                                        <a href="{{url('back_obt/quality_edit/'.$u->con_id)}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>                                                      
                                                    </td>  --}}
                                                    <td width="5%;">   
                                                        <a href="{{url('back_obt/contact_delete/'.$u->con_id)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>
                                                    </td> 
                                                </tr>

                                                   

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
        function switccontacts(contact){
            var checkBox=document.getElementById(contact);
            var onoff;

            if (checkBox.checked == true){
               onoff = "true";
                } else {
                    onoff = "false";
                }
            var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('obt.switchactive_contact')}}",
                        method:"GET",
                        data:{onoff:onoff,contact:contact,_token:_token}
                })
             }
       </script>
@endsection

