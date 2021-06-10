@extends('layouts.dash_products')

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
                                <h4 class="card-title">รายการหมวดหมู่</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            {{-- <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="hospital-book-appointment.html" target="_blank">View all</a> --}}
                                            {{-- <button type="button" class="btn btn-m btn-primary box-shadow-2 btn-min-width pull-right" data-toggle="modal" data-target="#rotateIn">เพิ่มบุคลากร <i class="ft-plus-circle ml-1"></i>&nbsp;&nbsp; --}}
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มหมวดหมู่ <i class="ft-plus-circle ml-1"></i>
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
                                                <th class="border-top-0">หมวดหมู่</th>
                                                <th class="border-top-0">วันที่</th>
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($cats as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate">{{$key+1}}</td>
                                                    <td class="text-truncate">{{$u->CAT_NAME}}</td>
                                                    <td class="text-truncate">{{Datethai($u->updated_at)}}</td>
                                                    <td> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->CAT_ID}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>&nbsp;&nbsp;                                                       
                                                        <a href="{{url('setting/category_delete/'.$u->CAT_ID)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>&nbsp;&nbsp;
                                                    </td>                                                  
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลตำแหน่ง-->
                                                    <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->CAT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลหมวดหมู่</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                        <form action="{{ route('per.category_update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf 
                                                            <input type="hidden" id="CAT_ID" name="CAT_ID" value="{{$u->CAT_ID}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>หมวดหมู่: </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <input type="text" placeholder="หมวดหมู่" class="form-control" id="CAT_NAME" name="CAT_NAME" value="{{$u->CAT_NAME}}" required>
                                                                                        <div class="form-control-position">
                                                                                            <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
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

 <!-- Modal เพิ่มข้อมูลตำแหน่ง-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลหมวดหมู่</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('per.category_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>หมวดหมู่: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="หมวดหมู่" class="form-control" id="CAT_NAME" name="CAT_NAME" required>
                                    <div class="form-control-position">
                                        <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
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


@endsection

