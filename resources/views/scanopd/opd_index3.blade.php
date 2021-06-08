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

                <div class="container" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-7">
                            <h4 class="text-center">Autocomplete Search Box with <br> Laravel + Ajax + jQuery</h4><hr>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        {{-- <label>Type a country name</label> --}}
                                        <input type="text" name="search" id="search" placeholder="Enter hn" class="form-control">                                
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn btn-m btn-info box-shadow-2 btn-min-width pull-left" type="submit" ><i class="ft-search text-white-90 mr-1" style="font-size:19px "></i>ค้นหา</button>                                
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                                <table class="table table-striped table-bordered">
                                 <thead>
                                  <tr>
                                   <th>Hn</th>
                                   <th>ชื่อ</th>
                                   <th>รามสกุล</th>
                                   <th>วันที่สแกน</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                          
                                 </tbody>
                                </table>
                               </div>                 
                        </div>
                        <div class="col-lg-3">
                            {{-- <button class="btn btn-m btn-success box-shadow-2 btn-min-width pull-left" type="submit" ><i class="ft-save text-white-50 ml-1" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>  --}}
                        </div>
                    </div>
                </div>
               
                         
            </div>
        </div>
    </div>
  </div>
  <!-- END: Content-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
    
     fetch_customer_data();
    
     function fetch_customer_data(query = '')
     {
      $.ajax({
       url:"{{ route('live_search.action') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     });
    });
    </script>
  

@endsection


