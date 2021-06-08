@extends('layouts.adminlte_report')

@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
<?php
    if(Auth::check()){
        $status = Auth::user()->status;
        $id_user = Auth::user()->name;
        $idd_user = Auth::user()->id;
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
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
        function formate($strDate)
        {
        $strYear = date("Y",strtotime($strDate));
        $strMonth= date("m",strtotime($strDate));
        $strDay= date("d",strtotime($strDate));

        return $strDay."/".$strMonth."/".$strYear;
        }
        function formatetime($strtime)
        {
        $H = substr($strtime,0,5);
        return $H;
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
?>
<style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
        .container-fluid-boxs{

        }
        .card-p{
            margin-left: 200px;
            margin-right: 200px;
        }
        .card-p-1{
            margin-left: 100px;
            margin-right: 30px;
        }
        .content-header-1{
            margin-left: 200px;
            margin-right: 200px;
        }
</style>
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid" style="width: 90%">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size:25px">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
        <div class="container-fluid" style="width: 95%">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                    <h3 class="card-title"> สั่งซื้อ-รับเข้า-เบิกจ่าย</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                    <div id="medic" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                    <h3 class="card-title"> สั่งซื้อ-รับเข้า-เบิกจ่าย</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                    <div id="medics" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </div>

<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('google/Charts.js') }}"></script>

    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
           google.charts.setOnLoadCallback(drawChart);
           function drawChart() {
             var data = google.visualization.arrayToDataTable( [
               ['Task','เวชภัณฑ์คลังยา'],
               ['สั่งซื้อ', <?php echo $drugs_or; ?>],
               ['รับเข้า', <?php echo $drugs_rec; ?>],
               ['เบิก-จ่าย',<?php echo $drugs_pay; ?>]
               ]);
             var options = {
               title: 'อัตราการ สั่งซื้อ-รับเข้า-เบิกจ่าย',
               fontName: 'Kanit',
               pieHole: 0.4,
             };
             var chart = new google.visualization.PieChart(document.getElementById('medic'));
             chart.draw(data, options);
             }
    </script>
@endsection
