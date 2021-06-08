@extends('layouts.adminlte')
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
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายการยา</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายการยา</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
</style>
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
    </script>
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

        use App\Http\Controllers\ClinicsettingController;
?>
 <section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg ">
            <h6 class="float-sm-left  font-weight-bold text-primary">รายการยา</h6>
            <a href="{{url('setting/drug_create/'.(Auth::user()->store_id))}}" class="float-sm-right btn btn-sm btn-success shadow-lg"><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp; เพิ่มรายการยา</a>
            <!-- <a href="" class="float-sm-right btn btn-sm btn-success shadow-lg" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp; เพิ่มรายการยา</a>                                           -->
        </div>

        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099" width="2%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="7%">Icode</th>
                            <th style="text-align: center;color:#7B0099" width="8%">รูปภาพ</th>
                            <th style="text-align: center;color:#7B0099" >รายการยา</th>
                            <th style="text-align: center;color:#7B0099" width="8%">หน่วยนับ</th>

                            <th style="text-align: center;color:#7B0099" width="8%">หมวดหมู่</th>
                            <th style="text-align: center;color:#7B0099" width="7%">รับ</th>
                            <th style="text-align: center;color:#7B0099" width="10%">เบิก-จ่าย</th>
                            <th style="text-align: center;color:#7B0099" width="10%">จ่าย(คลีนิก)</th>
                            <th style="text-align: center;color:#7B0099" width="8%">คงเหลือ</th>
                            <th style="text-align: center;color:#7B0099"width="12%">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                                <tr>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"> </td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>


                                    <td style="text-align: center;">
                                                <a href=""><i class="fas fa-fw fa-qrcode" style='font-size:15px;color:green'></i></a>
                                                <a href=""><i class="fas fa-fw fa-edit" style='font-size:15px;color:orange'></i> </a>

                                                <a href="" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" ><i class="fas fa-fw fa-trash" style='font-size:15px;color:red'></i></a>

                                    </td>
                                </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    </section>

    <script>
        function readURL(input) {
            var fileInput = document.getElementById('DRUG_IMG');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#edit_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
            }
</script>
<script>
    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

</script>
@endsection
