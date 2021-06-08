@extends('layouts.dash_main')

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
                                <h4 class="card-title">OPD</h4>
                               
                            </div>
                        <div class="card-content collpase show">
                            <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered sourced-data" > 
                                        {{-- sourced-data --}}
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">No</th>
                                                <th class="border-top-0">Vn</th>
                                                <th class="border-top-0">Hn</th>
                                                <th class="border-top-0">วันที่สแกน</th>
                                                {{-- <th class="border-top-0">ประเภท</th> --}}
                                                <th class="border-top-0">ชื่อ-นามสกุล</th>                                               
                                                <th class="border-top-0">Views</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($items as $key => $item)
                                                <tr class="pull-up">
                                                    <td align="center"> {{$key+1}}</td>
                                                    <td class="text-truncate">{{$item->vn}}</td>                                                 
                                                    <td class="text-truncate">{{$item->hn}}</td>
                                                    <td class="text-truncate">{{DateThai($item->datescan)}}</td>
                                                    {{-- <td class="text-truncate">{{$item->DocTypeName}}</td> --}}
                                                    <td class="text-truncate">{{$item->firstname}}  {{$item->lastname}}</td>
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
  </div>
  <!-- END: Content-->


  

@endsection


