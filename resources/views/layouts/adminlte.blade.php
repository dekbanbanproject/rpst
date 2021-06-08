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
{{-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper" >
  <!-- Navbar -->
  @include('..//layouts/adminlte_navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('..//layouts/adminlte_sildebar')

  <!--end Main Sidebar Container -->



    <!-- Main content -->

    @yield('content'  )

   @if(session()->has('success'))
   <script type="text/javascript">
        $(function(){
            $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'});
        });
   </script>
   @endif
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
    <img src="{{ asset('/img/logo/ss.png') }}"  alt="" style="height:50px; width:50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Copyright &copy; 2020-2023 <a href="http://projectbannok.com">projectbannok.com</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        พัฒนา โดย <cite title="Source Title" style='font-size:15px;color:rgb(250, 11, 2)'>นาย ประดิษฐ์  ระหา &nbsp;&nbsp;&nbsp;</cite>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-facebook" style='font-size:30px;color:rgb(253, 7, 122)'></i>&nbsp;&nbsp;Dekbanban Project
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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
<!-- page script -->
<script>
$(document).ready(function () {
  $(document).on('click','#symdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='sym_index';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $(document).on('click','#staffdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='index';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $(document).on('click','#drugdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'post',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='drug';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $(document).on('click','#locatedelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='locate';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });
  $(document).on('click','#unitdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='unit';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });
  $(document).on('click','#categorydelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='category';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $(document).on('click','#suppdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'get',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='supindex';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $(document).on('click','#drugrecdelete',function(){
              var actionTo = $(this).attr('href');
              var token = $(this).attr('data-token');
              var id = $(this).attr('data-id');

      swal({
          title: "คุณต้องการลบข้อมูลนี้ ?",
          text: "เช็คไห้แน่ใจก่อน เพราะคุณจะไม่สามารถกู้ไฟล์คืนมาได้!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ใช่, ลบเดี๋ยวนี้!",
          cancelButtonText: "ไม่, ยกเลิกก่อน!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              $.ajax({
                  url:actionTo,
                  type:'post',
                  data:{id:id, _token:token},
                  success:function(data){
                      swal({
                          title:"ลบเรียบร้อยแล้ว!",
                          type:"success"
                      },
                      function(isConfirm){
                          if (isConfirm) {
                              $('.'+  id).fadeOut();
                              window.location.href='recieve_drug';
                          }
                      });
                  }
              });
          }else{
              swal("ยกเลิกสำเร็จ","","error");
          }
      });
      return false;
  });

  $('#quickForm').validate({
    rules: {
      name: {
        required: true
      },
      cid: {
        required: true
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 4
      },
      status: {
        required: true
      },
      terms: {
        required: true
      },
    },
    messages: {
        name: {
        required: "Please enter a name",
        name: "Please enter a vaild name"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      cid: {
        required: "Please enter a cid",
        cid: "Please enter a vaild cid"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      status: {
        required: "Please enter a status",
        status: "Please enter a vaild status"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});



</script>

</body>
</html>
