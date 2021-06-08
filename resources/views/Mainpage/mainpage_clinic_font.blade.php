@extends('layouts.clinic_main_font')
@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>

<?php
    date_default_timezone_set("Asia/Bangkok");
    function DateThai($strDate)
    {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิถุนายน","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
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
    $datenow = date('Y-m-d');

    function get_client_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    $ip = get_client_ip_env();

?>
<style>
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
<body>
{{-- <body onload="check();startTime();">
<center>
    <form action="{{ route('Per.barcodeprint') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
    <div class="block" style="width: 90%;">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header shadow lg">
                        <h3 class="card-title">Print Sticker</h3>
                    </div>
                    <div class="card-body shadow lg">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <label for="ICODE">รหัสยา ( icode )</label>
                                    <input name = "ICODE"  id="ICODE"  class="form-control input-lg ">
                            </div>
                            <div class="col-md-6 text-left">
                                <label for="DRUG_NAME">ชื่อยา</label>
                                    <input name = "DRUG_NAME"  id="DRUG_NAME"  class="form-control input-lg ">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 mb-10 text-right">
                            </div>
                            <div class="col-md-2 mb-2">
                                <button class="float-sm-right btn btn-info" type="submit" ><i class="fa fa-print fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;Print Sticker </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header shadow lg">
                        <h3 class="card-title">Qrcode Login</h3>
                    </div>
                    <div class="card-body shadow lg">
                     <br>
                            <div class="time-container">
                            <h1 id="displayTime"></h1>
                            </div>
                            <center>{{ DateThai($datenow) }}</center>
                            <div class="content">
                            <center>

                             <div id="my_camera" name="my_camera"></div>
                             <div id="results">
                             <input type="hidden" name="results" id="results" value="">
                             </div>
                             </center>
                             <br>
                    </div>
                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 mb-10 text-right">
                            </div>
                            <div class="col-md-2 mb-2">
                                <button class="float-sm-right btn btn-info" type="submit" ><i class="fa fa-qrcode fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp; Login </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</center> --}}

@include('..//Mainpage/report1')

<script src="{{ asset('google/Charts.js') }}"></script>

<script src="{{ asset('webcamjs/webcam.min.js') }}"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">

function check(){
  navigator.getUserMedia=navigator.getUserMedia||navigator.webkitGetUserMedia||navigator.mozGetUserMedia||navigator.msGetUserMedia;
  if(navigator.getUserMedia)
  {
    Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach( '#my_camera' );

  }else{
    alert('กล้องไม่สามารถทำงานผ่าน Browser ได้!!\n - กรุณาตั้งค่า Browser หรือ ลงเวลาผ่าน Browser อื่น');
  }
}

</script>

<script language="JavaScript">

  function take_snapshot() {

    // take snapshot and get image data
    Webcam.snap( function(data_uri) {
      // display results in page
      $(".image-tag").val(data_uri);
      document.getElementById('results').innerHTML = '<input type="hidden" name="results" id="results" value="'+data_uri+'">';

    } );
  }
</script>

<script type="text/javascript">


   $(document).ready(function () {

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            }).datepicker("setDate", 0);  //กำหนดเป็นวันปัจุบัน
    });


    function chkmunny(ele){
var vchar = String.fromCharCode(event.keyCode);
if ((vchar<'0' || vchar>'9' )&& (vchar != '.')) return false;
ele.onKeyPress=vchar;
}

function startTime(){
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById("displayTime").innerHTML = h + ":" + m + ":" + s;
  document.getElementById('time').innerHTML = '<input type="hidden" name="time" id="time" value="'+h+":"+m+":"+s+'">';
  var t = setTimeout(startTime, 500);
  function checkTime(i){
    if(i < 10){
      i = "0" + i
    }
    return i;
  }
}

</script>


@endsection
