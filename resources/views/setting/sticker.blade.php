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
}else{

    echo "<body onload=\"checklogin()\"></body>";
    exit();
}
$url = Request::url();
$pos = strrpos($url, '/') + 1;
$user_id = substr($url, $pos);
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
        margin-left: 80px;
        margin-right: 80px;
    }
    .content-header{
        margin-left: 80px;
        margin-right: 80px;
    }
  </style>
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

 <section class="col-md-12">
    <div class="card-p shadow lg">
        <div class="card-header shadow lg ">
            <h6 class="float-sm-left  font-weight-bold text-primary">รายการยา</h6>

        </div>

        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099" width="3%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="8%">Barcode</th>
                            <th style="text-align: center;color:#7B0099" width="10%">รูปภาพ</th>
                            <th style="text-align: center;color:#7B0099" width="8%">Qrcode</th>
                            <th style="text-align: center;color:#7B0099" >รายการยา</th>
                            <th style="text-align: center;color:#7B0099" width="15%">Barcode &nbsp;&nbsp;<span style="font-size: 1em; color: red;"><i class="fas fa-barcode"></i> </span></th>
                            <th style="text-align: center;color:#7B0099" width="15%">Qrcode&nbsp;&nbsp;<span style="font-size: 1em; color: orange;"><i class="fas fa-fw fa-qrcode"></i> </span></th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($drugs as $drug)
                            <?php $number++;  ?>
                                <tr>
                                    <td style="text-align: center;">{{ $number}}</td>
                                    <td style="text-align: center;">{{$drug->DRUG_CODE }}<?php echo DNS1D::getBarcodeHTML($drug->DRUG_CODE, 'C128');  ?></td>
                                    <td style="text-align: center;"><img src="data:image/png;base64,{{ chunk_split(base64_encode($drug->DRUG_IMG)) }}" alt="Image" class="img-thumbnail" style="height:60px; width:70px;"> </td>
                                    <td style="text-align: center;"> <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drug->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?></td>
                                    <td style="text-align: center;">{{$drug->DRUG_NAME }}</td>

                                    <td style="text-align: center;">
                                        <a href="{{ url('setting/stickerbarcodeprint/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID)  }}" ><span style='font-size:24px;color:red'><i class="fas fa-print"></i> </span></a>
                                       
                                    </td>
                                    <td style="text-align: center;">
                                    <a class="dropdown-item"  href="{{ url('setting/stickerqrcodeprint/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID )  }}" ><span style='font-size:24px;color:orange'><i class="fas fa-print"></i> </span></a>
                                    </td>

                                </tr>



                        @endforeach
                    </tbody>
                </table>


        </div>
    </div>
</div>
</section>





@endsection
