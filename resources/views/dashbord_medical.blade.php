<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
<?php

    if(Auth::check()){
        $status = Auth::user()->status;
        // $id_user = Auth::user()->name;
        // $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Dekbanban-Project') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
{{-- <body class="hold-transition sidebar-mini"> --}}
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  @include('..//layouts/adminlte_navbar_medical')

  @include('..//layouts/adminlte_sildebar_medical')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<br>
<center>
<!-- Main content -->
<section class="content" style="width: 90%;">
        <div class="container-fluid">


        @include('chart/drug_1')

        @include('chart/drug_2')

        @include('chart/drug_3')

        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Chart Order</h3>
                    <?php $data_order[] = array('รายการ Store','Store'); ?>
                    @foreach ($drug_orders as $drug_order)
                        <?php $data_order[] = array($drug_order->DRUG_NAME,$drug_order->drug_order_count); ?>
                            @endforeach
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div id="drug_order" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title"> รายการยาที่รับ</h3>
                        <?php $data_drug_rec[] = array('รายการยา','รายการยา'); ?>
                    @foreach ($drug_recieves as $drug_recieve)
                        <?php $data_drug_rec[] = array($drug_recieve->DRUG_NAME,$drug_recieve->drug_rec_count); ?>
                            @endforeach
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div id="drug_recieve" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Chart Store ที่เบิกจ่าย</h3>
                    <?php $data_paystore[] = array('รายการ Store','Store'); ?>
                    @foreach ($lopiechart as $lo_piechart)
                        <?php $data_paystore[] = array($lo_piechart->LOCATE_NAME,$lo_piechart->store_count); ?>
                            @endforeach
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div id="piechart_paystore" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title"> รายการยาที่เบิกจ่าย</h3>
                        <?php $data_drugs[] = array('รายการยา','รายการยา'); ?>
                    @foreach ($drug_piecharts as $drug_piechart)
                        <?php $data_drugs[] = array($drug_piechart->DRUG_NAME,$drug_piechart->drugs_count); ?>
                            @endforeach
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div id="piechart_drugs" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Chart หมวดหมู่รายการยา</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <?php $data_cat[] = array('รายการยา','หมวดหมู่'); ?>
                        @foreach ($cat_piecharts as $cat_piechart)
                            <?php $data_cat[] = array($cat_piechart->CAT_NAME,$cat_piechart->cat_count); ?>
                                @endforeach
                    <div id="drug_cat" style="width: 100%; height: 400px;"></div>
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title"> Chart Supplies</h3>
                            <?php $data_suprec[] = array('รายการ Supplies','Supplies'); ?>
                        @foreach ($sup_piecharts as $sup_piechart)
                            <?php $data_suprec[] = array($sup_piechart->SUP_NAME,$sup_piechart->sup_count); ?>
                                @endforeach
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div id="piechart_suprec" style="width: 100%; height: 400px;"></div>
                            </div>

                        </div>

            </div>
        </div>



      </div><!--/. container-fluid -->
</section>
    <!-- /.content -->
</center>
    <!-- Main content -->
    {{-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            @include('chart/area_1')

            @include('chart/donut_1')

          </div>

          <div class="col-md-6">

          @include('chart/line_1')

          </div>


          @include('chart/bar_1')

          @include('chart/stackbar_1')

          </div>

        </div>


        @include('chart/drug')


        @include('chart/line')


      </div>

    </section> --}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





 <!-- Main Footer -->

 <footer class="main-footer">&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{ asset('/img/logo/rpst.jpg') }}"  alt="" style="height:50px; width:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Copyright &copy; 2020-2023 <a href="http://projectbannok.com">projectbannok.com</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        พัฒนา โดย <cite title="Source Title" style='font-size:15px;color:rgb(250, 11, 2)'>นาย ประดิษฐ์  ระหา &nbsp;&nbsp;&nbsp;</cite>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-facebook" style='font-size:30px;color:rgb(253, 7, 122)'></i>&nbsp;&nbsp;Dekbanban Project
        </div>
    </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- googleCharts -->
<script src="{{ asset('google/Charts.js') }}"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_drugs);
            ?>);

      var options = {
          title: 'รายการยาที่เบิกจ่าย',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_drugs'));
        chart.draw(data, options);
        }

</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_order);
            ?>);

      var options = {
          title: 'รายการยาที่สั่ง',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('drug_order'));
        chart.draw(data, options);
        }

</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_drug_rec);
            ?>);

      var options = {
          title: 'รายการยาที่รับ',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('drug_recieve'));
        chart.draw(data, options);
        }

</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_paystore);
            ?>);

      var options = {
          title: 'รายการ Store ที่เบิกจ่าย',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_paystore'));
        chart.draw(data, options);
        }

</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_cat);
            ?>);

      var options = {
          title: 'หมวดหมู่รายการยา',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('drug_cat'));
        chart.draw(data, options);
        }

</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_suprec);
            ?>);

      var options = {
          title: 'รายการ Supplies ที่รับเข้า',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_suprec'));
        chart.draw(data, options);
        }

</script>

</body>
</html>
