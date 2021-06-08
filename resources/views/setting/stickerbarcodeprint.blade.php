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
  function formateDatetime($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $H= date("H",strtotime($strDate));
    $I= date("i",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];

  return  "$strDay $strMonthThai $strYear $H:$I";
    }
  function formatetime($strtime)
{
  $H = substr($strtime,0,5);
  return $H;
  }
  date_default_timezone_set("Asia/Bangkok");
  $date = date('Y-m-d');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            /* font-family: "THSarabunNew"; */
        }
        table {
        border-collapse: collapse;
        }
        table, th, td {
        border: 1px solid black;
        }
    </style>
</head>

<body>
<br>
<center>
    <div class="block" style="width: 90%;">
        <div class="row">
            <div class="col-md-2">
                &nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>

            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp; {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp; {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp; {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">&nbsp;&nbsp;&nbsp;&nbsp;
                {{$drugs->DRUG_CODE }}
                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugs->DRUG_CODE, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                &nbsp;&nbsp;{{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>

    </div>
    </center>
@endsection
