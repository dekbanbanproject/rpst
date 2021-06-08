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
                                <h4 class="card-title">รายการคลังย่อย</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            {{-- <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="hospital-book-appointment.html" target="_blank">View all</a> --}}
                                            {{-- <button type="button" class="btn btn-m btn-primary box-shadow-2 btn-min-width pull-right" data-toggle="modal" data-target="#rotateIn">เพิ่มบุคลากร <i class="ft-plus-circle ml-1"></i>&nbsp;&nbsp; --}}
                                            <button type="button" class="btn btn-m btn-success box-shadow-2 btn-min-width pull-right mr-2" data-toggle="modal" data-target="#rotateInposition">เพิ่มคลังย่อย <i class="ft-plus-circle ml-1"></i>
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
                                                <th class="border-top-0">คลังย่อย</th>
                                                <th class="border-top-0">Line Token</th>
                                                <th class="border-top-0">ผู้ดูแลคลังย่อย</th>
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($stosubs as $key => $u)
                                                <tr class="pull-up">
                                                    <td class="text-truncate">{{$key+1}}</td>
                                                    <td class="text-truncate">{{$u->STORE_SUB_NAME}}</td>
                                                    <td class="text-truncate">{{$u->STORE_LINETOKEN}}</td>
                                                    <td class="text-truncate">{{$u->name}}  {{$u->lname}}</td>                                                   
                                                    <td> 
                                                        <a href="" data-toggle="modal" data-target="#rotateInDownRight{{$u->STORE_SUB_ID}}"><i class="la la-edit font-large-1" style="color:rgb(255, 72, 0)"></i></a>&nbsp;&nbsp;                                                       
                                                        <a href="{{url('setting/storesub_delete/'.$u->STORE_SUB_ID)}}"> <i class="la la-trash font-large-1" style="color:rgb(243, 12, 4)"></i></a>&nbsp;&nbsp;
                                                    </td>                                                  
                                                </tr>

                                                    <!-- Modal แก้ไขข้อมูลคลังย่อย-->
                                                    <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{$u->STORE_SUB_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
                                                        <div class="modal-dialog " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary ">
                                                                    <h4 class="modal-title text-white" id="myModalLabel64">แก้ไขข้อมูลคลังย่อย</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                        <form action="{{ route('per.storesub_update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf 
                                                            <input type="hidden" id="STORE_SUB_ID" name="STORE_SUB_ID" value="{{$u->STORE_SUB_ID}}">
                                                                <div class="modal-body">
                                                                    <div class="row">                   
                                                                        <div class="form-group col-12 mb-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>คลังย่อย: </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <input type="text" placeholder="คลังย่อย" class="form-control" id="STORE_SUB_NAME" name="STORE_SUB_NAME" value="{{$u->STORE_SUB_NAME}}" required>
                                                                                        <div class="form-control-position">
                                                                                            <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="col-md-12">
                                                                                    <label>Line Token: </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <input type="text" placeholder="Line Token" class="form-control" id="STORE_SUB_LINETOKEN" name="STORE_SUB_LINETOKEN" value="{{$u->STORE_SUB_LINETOKEN}}" required>
                                                                                        <div class="form-control-position">
                                                                                            <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="col-md-12">
                                                                                    <label>ผู้ดูแลคลังย่อย: </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <select name="PER_ID" id="PER_ID" class="form-control" required>
                                                                                        @foreach ($user as $s)
                                                                                            @if ($s->id == $u->PER_ID)
                                                                                                <option value="{{ $s->id }}" selected> {{ $s->name }}  {{ $s->lname }} </option>
                                                                                            @else
                                                                                                <option value="{{ $s->id }}">{{ $s->name }}  {{ $s->lname }} </option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
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

 <!-- Modal เพิ่มข้อมูลคลังย่อย-->
 <div class="modal animated rotateInDownLeft text-left" id="rotateInposition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white" id="myModalLabel64">เพิ่มข้อมูลคลังย่อย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <form action="{{ route('per.storesub_save') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" id="id_user" name="id_user" value="{{$data->id}}">
            <div class="modal-body">
                <div class="row">                   
                    <div class="form-group col-12 mb-2">
                        <div class="row">
                           <div class="col-md-12">
                                <label>คลังย่อย: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="คลังย่อย" class="form-control" id="STORE_SUB_NAME" name="STORE_SUB_NAME" required>
                                    <div class="form-control-position">
                                        <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <label>Line Token: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" placeholder="Line Token" class="form-control" id="STORE_SUB_LINETOKEN" name="STORE_SUB_LINETOKEN" required>
                                    <div class="form-control-position">
                                        <i class="la la-user font-large-1 line-height-1 text-muted icon-align"></i>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <label>ผู้ดูแลคลังย่อย: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <select name="PER_ID" id="PER_ID" class="form-control" style="width: 100%" required>
                                        <option value="">----เลือก----</option>
                                        @foreach ($user as $s)                                            
                                                <option value="{{ $s->id }}">{{ $s->name }}  {{ $s->lname }} </option>
                                        @endforeach
                                    </select>
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
@endsection

