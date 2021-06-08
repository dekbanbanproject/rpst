<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
<?php

    if(Auth::check()){
        $status = Auth::user()->status;
        $id_user = Auth::user()->name;
        $idstore =  Auth::user()->store_id;
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

  @include('..//layouts/adminlte_navbar_home')

  @include('..//layouts/adminlte_sildebar_home')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <br>
    <center>
    <!-- Main content -->
        <section class="content" style="width: 95%;">
                <div class="container-fluid">
                    @include('home/main_1')

                    {{-- @include('chart/drug_2') --}}

                    {{-- @include('chart/drug_3') --}}
                </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </center>

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



</body>
</html>
