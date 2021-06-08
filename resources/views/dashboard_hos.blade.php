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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name', 'Dekbanban-Project') }}</title>

  <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/css">
  .notifyjs-corner{
    z-index:10000 !important;
  }
</script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  @include('..//layouts/adminlte_navbar_hos')

  @include('..//layouts/adminlte_sildebar_hos')

    <div class="content-wrapper">
<br>
    <center>
        <div class="block" style="width: 95%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Person Type</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div id="person_type" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title"> Pttype</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                            <div class="card-body">

                            <div id="pttype" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">จำนวนประชากร</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">

                        <div id="person_village" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title"> Person Anc</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div id="person_anc" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">ทะเบียนความดัน</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                        <div class="card-body">

                        <div id="person_ht" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title"> ทะเบียนเบาหวาน</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div id="person_dm" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </center>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

        <footer class="main-footer">&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="{{ asset('/img/logo/rpst.jpg') }}"  alt="" style="height:50px; width:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Copyright &copy; 2020-2023 <a href="http://projectbannok.com">projectbannok.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            พัฒนา โดย <cite title="Source Title" style='font-size:15px;color:rgb(250, 11, 2)'>นาย ประดิษฐ์  ระหา &nbsp;&nbsp;&nbsp;</cite>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-facebook" style='font-size:30px;color:rgb(253, 7, 122)'></i>&nbsp;&nbsp;Dekbanban Project
            </div>
        </footer>


</div>
<!-- ./wrapper -->

<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- PAGE SCRIPTS -->

<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('google/Charts.js') }}"></script>
<script>
 $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person Type'],
           ['1-มีชื่อในทะเบียนบ้าน และอยู่อาศัยจริง',     <?php echo $per_co1; ?>],
           ['2-มีชื่อในทะเบียนบ้านแต่ไม่ได้อยู่อาศัย',     <?php echo $per_co2; ?>],
           ['3-ไม่มีชื่อในทะเบียนบ้านแต่มาอยู่อาศัย',     <?php echo $per_co3; ?>],
           ['4-บุคคลนอกเขต',     <?php echo $per_co4; ?>],
           ]);
         var options = {
           title: 'อัตราประชากร เทียบตาม Type',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('person_type'));
         chart.draw(data, options);
         }
</script>
 <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person Type'],
           ['00 : ข้าราชการและ/หรือพนง.รัฐวิสาหกิจ', <?php echo $per_00; ?>],
           ['02 : ประกันสังคม',     <?php echo $per_02; ?>],
           ['09 : สิทธิทหารผ่านศึก',     <?php echo $per_09; ?>],
           ['25 : สิทธิประกันสังคมกรณีทุพลภาพ',   <?php echo $per_25; ?>],
           ['26 : สิทธิประกันสังคมทุพลภาพและสิทธิข้าราชการ/สิทธิรัฐวิสาหกิจ',   <?php echo $per_26; ?>],
           ['27 : สิทธิครูเอกชน/สิทธิประกันสังคมแบบทุพพลภาพ',   <?php echo $per_27; ?>],
           ['28 : สิทธิประกันสังคมแบบทุพพลภาพ/สิทธิทหารผ่านศึก/สิทธิข้าราชการ',   <?php echo $per_28; ?>],
           ['29 : สิทธิประกันสังคมแบบทุพพลภาพ/สิทธิทหารผ่านศึก',   <?php echo $per_29; ?>],
           ['45 : กองทุนประกันสังคม รพ.ร้อยเอ็ด(ผู้ประกันตน)S1',   <?php echo $per_45; ?>],
           ['46 : ประก้นสังคม รพ.ร้อยเอ็ด(เบิกส่วนต่างกรมบัญชีกลางได้เฉพาะกรณี)S2',   <?php echo $per_46; ?>],
           ['47 : รพ.ร้อยเอ็ด(เบิกส่วนต่างจากอปท. ได้เฉพาะกรณี)S3',   <?php echo $per_47; ?>],
           ['71 : เด็ก 0 - 12 ปี',   <?php echo $per_71; ?>],
           ['72 : ผู้มีบัตรสวัสดิการประชาชน(สปร. / รายได้น้อย)',   <?php echo $per_72; ?>],
           ['73 : นักเรียนมัธยมศึกษาตอนต้น (ม,1- 3)',   <?php echo $per_73; ?>],
           ['74 : ผู้พิการ/ทุพพลภาพ',   <?php echo $per_74; ?>],
           ['75 : ทหารผ่านศึก',   <?php echo $per_75; ?>],
           ['76 : ภิกษุ/สามเณร/ผู้นำศาสนา',   <?php echo $per_76; ?>],
           ['77 : ผู้สูงอายุ',   <?php echo $per_77; ?>],
           ['78 : บัตรชั่วคราว',   <?php echo $per_78; ?>],
           ['79 : ผู้ว่างงาน',   <?php echo $per_79; ?>],
           ['80 : ครอบครัวทหารผ่านศึก',   <?php echo $per_80; ?>],
           ['81 : บัตรสวัสดิการสำหรับผู้นำชุมชน',   <?php echo $per_81; ?>],
           ['82 : บัตรสวัสดิการสำหรับ อสม.',   <?php echo $per_82; ?>],
           ['87 : บุคคลในครอบครัว ผู้นำชุมชน',   <?php echo $per_87; ?>],
           ['88 : บุคคลในครอบครัว อสม.',   <?php echo $per_88; ?>],
           ['89 : บัตรประกันสุขภาพถ้วนหน้า(UC)',   <?php echo $per_89; ?>],
           ['90 : ทหารเกณฑ์',   <?php echo $per_90; ?>],
           ['L0 : สิทธิข้าราชการท้องถิ่น (LGO)',   <?php echo $per_L0; ?>],
           ['L1 : สิทธิข้าราชการท้องถิ่น(ข้าราชการ/พนักงาน/ลูกจ้างประจำ)',   <?php echo $per_L1; ?>],
           ['L2 : สิทธิข้าราชการท้องถิ่น(บุคคลในครอบครัว)',   <?php echo $per_L2; ?>],
           ['L3 : สิทธิข้าราชการท้องถิ่น(ผู้รับเบี้ยหวัดบำนาญ)',   <?php echo $per_L3; ?>],
           ['L4 : สิทธิข้าราชการท้องถิ่น(บุคคลในครอบครัวผู้รับเบี้ยหวัดบำนาญ)',   <?php echo $per_L4; ?>],
           ['L5 : สิทธิข้าราชการท้องถิ่น(ข้าราชการการเมือง)',   <?php echo $per_L5; ?>],
           ['L6 : สิทธิข้าราชการท้องถิ่น(บุคคลในครอบครัวข้าราชการการเมือง)',   <?php echo $per_L6; ?>],
           ['L9-สิทธิสวัสดิการพนักงานส่วนท้องถิ่น (ยังไม่ระบุตำแหน่ง)',   <?php echo $per_L9; ?>],
           ['ND : ผู้พิการที่จดทะเบียนตาม พรบ.ฟื้นฟูสมรรถคนพิการ',   <?php echo $per_ND; ?>],
           ['nu : สิทธิว่าง',   <?php echo $per_nu; ?>],
           ['NV : ทหารผ่านศึก',   <?php echo $per_NV; ?>],
           ['O1 : สิทธิเบิกกรมบัญชีกลาง(ข้าราชการ)',   <?php echo $per_O1; ?>],
           ['O2 : สิทธิเบิกกรมบัญชีกลาง(ลูกจ้างประจำ)',   <?php echo $per_O2; ?>],
           ['O3 : สิทธิเบิกกรมบัญชีกลาง(ผู้รับเบี้ยหวัดบำนาญ)',   <?php echo $per_O3; ?>],
           ['O4 : สิทธิเบิกกรมบัญชีกลาง(บุคคลในครอบครัว)',   <?php echo $per_O4; ?>],
           ['O5 : สิทธิเบิกกรมบัญชีกลาง(บุคคลในครอบครัวผู้รับเบี้ยหวัดบำนาญ)',   <?php echo $per_O5; ?>],
           ['P1 : ครูเอกชน',   <?php echo $per_P1; ?>],
           ['P2 : ครูเอกชน (เบิกส่วนเกินหนึ่งแสนบาทจากกรมบัญชีกลาง)',   <?php echo $per_P2; ?>],
           ['P3 : สิทธิครูเอกชน(เบิกส่วนเกินหนึ่งแสนบาทจาก อปท.)',   <?php echo $per_P3; ?>],
           ['S1 : สิทธิเบิกกองทุนประกันสังคม(ผู้ประกันตน)',   <?php echo $per_S1; ?>],
           ['S2 : สิทธิเบิกประกันสังคม(เบิกส่วนต่างกรมบัญชีกลางได้เฉพาะกรณี)',   <?php echo $per_S2; ?>],
           ['S3 : สิทธิเบิกประกันสังคม(เบิกส่วนต่างจากอปท. ได้เฉพาะกรณี)',   <?php echo $per_S3; ?>],
           ['S6 : สิทธิบิกประกันสังคมทุพลภาพ',   <?php echo $per_S6; ?>],
           ['ST : สิทธิเบิกงานประกันสุขภาพกระทรวงสาธารณสุข',   <?php echo $per_ST; ?>],
           ['VD : ทหารผ่านศึกและผู้พิการที่จดทะเบียนตาม พรบ.ฟื้นฟูสมรรถคนพิการ',   <?php echo $per_VD; ?>],

        ]);

      var options = {
          title: 'รายการสิทธิ์การรักษา',
          fontName: 'Kanit',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('pttype'));
        chart.draw(data, options);
        }

</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person Type'],
           ['0-นอกเขต(สำหรับบันทึกบ้านและคน นอกเขตฯ)',     <?php echo $per_moo_0; ?>],
           ['1-วังม่วยเหนือ',     <?php echo $per_moo_1; ?>],
           ['2-โคกสะอาด',     <?php echo $per_moo_2; ?>],
           ['3-วังม่วยใต้',     <?php echo $per_moo_3; ?>],
           ['4-กุดก่วง',     <?php echo $per_moo_4; ?>],
           ['5-เหล่าน้อย',     <?php echo $per_moo_5; ?>],
           ['6-โชคชัย',     <?php echo $per_moo_6; ?>],
           ['7-หนองสิม',     <?php echo $per_moo_7; ?>],
           ['8-วังยาว',     <?php echo $per_moo_8; ?>],
           ['9-วังม่วยพัฒนา',     <?php echo $per_moo_9; ?>],
           ['10-ใหม่ทุ่งทอง',     <?php echo $per_moo_10; ?>],
           ['11-ท่าแสงจันทร์',     <?php echo $per_moo_11; ?>],
           ['12-ใหม่ยิ่งเจริญ',     <?php echo $per_moo_12; ?>],
           ]);
         var options = {
           title: 'อัตราประชากร ในแต่ละหมู่บ้าน',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('person_village'));
         chart.draw(data, options);
         }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person anc'],
           ['ปี 2015',     <?php echo $per_anc1; ?>],
           ['ปี 2016',     <?php echo $per_anc2; ?>],
           ['ปี 2017',     <?php echo $per_anc3; ?>],
           ['ปี 2018',     <?php echo $per_anc4; ?>],
           ['ปี 2019',     <?php echo $per_anc5; ?>],
           ['ปี 2020',     <?php echo $per_anc6; ?>],
           ['ปี 2021',     <?php echo $per_anc7; ?>],
           ['ปี 2022',     <?php echo $per_anc8; ?>],
           ['ปี 2023',     <?php echo $per_anc9; ?>],
           ['ปี 2024',     <?php echo $per_anc10; ?>],
           ['ปี 2025',     <?php echo $per_anc11; ?>],
           ['ปี 2026',     <?php echo $per_anc12; ?>],
           ['ปี 2027',     <?php echo $per_anc13; ?>],
           ]);
         var options = {
           title: 'อัตราประชากร ANC ในแต่ละปี',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('person_anc'));
         chart.draw(data, options);
         }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person anc'],
           ['ปี 2007',     <?php echo $per_dm01; ?>],
           ['ปี 2008',     <?php echo $per_dm02; ?>],
           ['ปี 2009',     <?php echo $per_dm03; ?>],
           ['ปี 2010',     <?php echo $per_dm04; ?>],
           ['ปี 2011',     <?php echo $per_dm05; ?>],
           ['ปี 2012',     <?php echo $per_dm06; ?>],
           ['ปี 2013',     <?php echo $per_dm07; ?>],
           ['ปี 2014',     <?php echo $per_dm08; ?>],
           ['ปี 2015',     <?php echo $per_dm1; ?>],
           ['ปี 2016',     <?php echo $per_dm2; ?>],
           ['ปี 2017',     <?php echo $per_dm3; ?>],
           ['ปี 2018',     <?php echo $per_dm4; ?>],
           ['ปี 2019',     <?php echo $per_dm5; ?>],
           ['ปี 2020',     <?php echo $per_dm6; ?>],
           ['ปี 2021',     <?php echo $per_dm7; ?>],
           ['ปี 2022',     <?php echo $per_dm8; ?>],
           ['ปี 2023',     <?php echo $per_dm9; ?>],
           ['ปี 2024',     <?php echo $per_dm10; ?>],
           ['ปี 2025',     <?php echo $per_dm11; ?>],
           ['ปี 2026',     <?php echo $per_dm12; ?>],
           ['ปี 2027',     <?php echo $per_dm13; ?>],
           ]);
         var options = {
           title: 'อัตราประชากร เบาหวาน ในแต่ละปี',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('person_dm'));
         chart.draw(data, options);
         }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person anc'],
           ['ปี 2007', <?php echo $per_ht1; ?>],
           ['ปี 2008', <?php echo $per_ht2; ?>],
           ['ปี 2009', <?php echo $per_ht3; ?>],
           ['ปี 2010',  <?php echo $per_ht4; ?>],
           ['ปี 2011',  <?php echo $per_ht5; ?>],
           ['ปี 2012',  <?php echo $per_ht6; ?>],
           ['ปี 2013',  <?php echo $per_ht7; ?>],
           ['ปี 2014',  <?php echo $per_ht8; ?>],
           ['ปี 2015',  <?php echo $per_ht9; ?>],
           ['ปี 2016', <?php echo $per_ht10; ?>],
           ['ปี 2017', <?php echo $per_ht11; ?>],
           ['ปี 2018', <?php echo $per_ht12; ?>],
           ['ปี 2019', <?php echo $per_ht13; ?>],
           ['ปี 2020', <?php echo $per_ht14; ?>],
           ['ปี 2021', <?php echo $per_ht15; ?>],
           ['ปี 2022', <?php echo $per_ht16; ?>],
           ['ปี 2023', <?php echo $per_ht17; ?>],
           ['ปี 2024', <?php echo $per_ht18; ?>],
           ['ปี 2025',  <?php echo $per_ht19; ?>],
           ['ปี 2026', <?php echo $per_ht20; ?>],
           ['ปี 2027', <?php echo $per_ht21; ?>],
           ]);
         var options = {
           title: 'อัตราประชากร ความดัน ในแต่ละปี',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('person_ht'));
         chart.draw(data, options);
         }
</script>
</body>
</html>
