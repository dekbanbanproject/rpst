@extends('layouts.dash_products')

@section('content')

<style>
      .dataTables_wrapper   .dataTables_filter{
        float: right 
        }

    .dataTables_wrapper  .dataTables_length{
            float: left 
        }
        .dataTables_info {
            float: left;
        }
        .dataTables_paginate{
            float: right
        }
</style>
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
 
?>
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
                                <h4 class="card-title">Products</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <button type="button" class="btn btn-m btn-primary box-shadow-2 btn-min-width pull-right" data-toggle="modal" data-target="#rotateIn">Add <i class="ft-plus-circle ml-1"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-content collpase show">
                            <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered sourced-data" > 
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">ลำดับ</th>
                                                <th class="border-top-0">icode</th>
                                                <th class="border-top-0">รูปภาพ</th>
                                                <th class="border-top-0">รายการยา</th>
                                                <th class="border-top-0">จำนวน</th>
                                                <th class="border-top-0">หน่วยนับ</th>                                               
                                                <th class="border-top-0">ราคา</th>
                                                <th class="border-top-0">หมวดหมู่</th>
                                                <th class="border-top-0">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($Pros as $key => $item)
                                                <tr class="pull-up">
                                                    <td align="center"> {{$key+1}}</td>
                                                    <td class="text-truncate">{{$item->PRO_CODE}}<?php echo DNS1D::getBarcodeHTML($item->PRO_CODE, 'C128');  ?></td>                                                 
                                                    <td class="text-truncate"><img src="{{ asset('img/product/' .$item->PRO_PIC)}}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"></td>
                                                    <td class="text-truncate">{{$item->PRO_NAME}}</td>
                                                    <td class="text-truncate">{{$item->PRO_QTY}}</td>
                                                    <td class="text-truncate">{{$item->UNITS_NAME}}</td>
                                                    <td class="text-truncate">{{ number_format($Pro->PRO_PRICE,2)}}</td>
                                                    <td class="text-truncate">{{$item->CAT_NAME}}</td>
                                                    <td>
                                                        <a href="{{url('backend/opd/scan_opddetail/'.$item->hn.'/'.$item->vn)}}"><i class="la la-weibo font-large-1" style="color:rgb(7, 150, 233)"></i></a>&nbsp;&nbsp;                                                                            
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
               
                         
            </div>
        </div>
    </div>
  </div>
  <!-- END: Content-->
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


