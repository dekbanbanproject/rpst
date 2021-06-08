@extends('layouts.adminlte_medical')
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
            <h1 class="m-0 text-dark">รายการยาจาก Hosxp</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายการยาจาก Hosxp</li>
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
        .card{
            margin-left: 20px;
            margin-right: 20px;
        }
        .content-header{
            margin-left: 20px;
            margin-right: 20px;
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

        use App\Http\Controllers\HosController;
?>
 <section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg ">
            <h6 class="float-sm-left  font-weight-bold text-primary">รายการยาจาก Hosxp</h6>


            <form  method="post" action="{{ route('hos.drug_hos_save')}}" enctype="multipart/form-data"  class="needs-validation" novalidate>
                @csrf
                @foreach ($drug_hoss as $drug_hos)
                    <input type="hidden" name="store_id[]" id="store_id" value="{{Auth::user()->store_id}}">
                    <input type="hidden" name="icode[]" id="icode" value="{{$drug_hos->icode}}">
                    <input type="hidden" name="name[]" id="name" value="{{ $drug_hos->name }}">
                    <input type="hidden" name="strength[]" id="strength" value="{{ $drug_hos->strength }}">
                    <input type="hidden" name="units[]" id="units" value="{{ $drug_hos->units }}">
                    <input type="hidden" name="unitprice[]" id="unitprice" value="{{ $drug_hos->unitprice }}">
                    <input type="hidden" name="unitcost[]" id="unitcost" value="{{ $drug_hos->unitcost }}">
                    <input type="hidden" name="did[]" id="did" value="{{ $drug_hos->did }}">
                    <input type="hidden" name="istatus[]" id="istatus" value="{{ $drug_hos->istatus }}">  
                   
                    <input type="hidden" name="qty[]" id="qty"  value="{{number_format(HosController::sumdrug_hos_qty($drug_hos->icode))}}">                   
                @endforeach

               <input type="hidden" name="idstore" id="iduser" value="{{Auth::user()->store_id}}">                 
                <input type="hidden" name="iduser" id="iduser" value="{{Auth::user()->id}}">                 

             <div align="right">
                    <button class=" btn btn-sm btn-info shadow-lg">&nbsp;<i class="fas fa-download text-white-90" style="font-size:15px "></i>&nbsp;&nbsp;&nbsp; นำเข้า</button>&nbsp;&nbsp;
             </div>
        </div>
    </form>
        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099" width="2%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="7%">Icode</th>
                            <th style="text-align: center;color:#7B0099" >รายการยา</th>
                            <th style="text-align: center;color:#7B0099" width="15%">ความแร็ง</th>
                            <th style="text-align: center;color:#7B0099" width="15%">หน่วยนับ</th>
                            <th style="text-align: center;color:#7B0099" width="7%">ราคา</th>
                            <th style="text-align: center;color:#7B0099" width="10%">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($drug_hoss as $drug_hos)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td style="text-align: center;">{{$drug_hos->icode }}<?php echo DNS1D::getBarcodeHTML($drug_hos->icode, 'C128');  ?></td>
                                    <td style="text-align: center;">{{$drug_hos->name }}</td>
                                    <td style="text-align: center;">{{$drug_hos->strength }}</td>
                                    <td style="text-align: center;">{{$drug_hos->units }}</td>
                                    <td style="text-align: center;">{{$drug_hos->unitprice }}</td>
                                    <td style="text-align: center;">{{number_format(HosController::sumdrug_hos_qty($drug_hos->icode))}}</td>
                                </tr>

                        @endforeach
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
