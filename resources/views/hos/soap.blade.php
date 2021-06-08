@extends('layouts.adminlte_hos')
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
    .bs-example{
        margin: 5px;
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
        function formateDatetime($strtime)
        {
        $H = substr($strtime,0,5);
        return $H;
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');

        use App\Http\Controllers\HosController;
?>

<center>
    <div class="block" style="width: 95%;">
        <div class="bs-example">
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar"
                    aria-valuenow=""
                    aria-valuemin="0" aria-valuemax="100" style="width: 0px;" > 0%
                </div>
            </div>
            <br>
            <div id="success">
            </div>
        </div>
 <section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg ">
            <h6 class="float-sm-left  font-weight-bold text-primary">ตรวจสิทธิ์</h6>



             <div align="right">
                <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-3">
                        <select name="LOCATE_CODE" id="LOCATE_CODE" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                            <option value="">--เลือกสถานพยาบาล--</option>

                        </select>
                    </div>
                    <div class="col-3">
                        <span>
                            <select name="TYPE_NAME" id="TYPE_NAME" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                                <option value="">--เลือกสิทธิ์ในเขต--</option>

                            </select>
                            <div class="invalid-feedback">กรุณาเลือกสิทธิ์ในเขต</div>
                            <div class="valid-feedback"> สำเร็จ !! </div>
                        </span>
                    </div>
                    <div class="col-3">
                        <select name="HMAIN_CODE" id="HMAIN_CODE" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                            <option value="">--เลือกโรงพยาบาลแม่ข่าย--</option>

                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-md-1.5">
                        <button type="submit" class="btn  btn-info shadow-lg">&nbsp;<i class="fas fa-download text-white-90" style="font-size:15px "></i>&nbsp;&nbsp;&nbsp; Update</button>&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
            <thead style="background-color: #b9a6ca;">
                <tr height="40">
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="3%">ลำดับ</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="5%">cid</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" >ชื่อ-นามสกุล</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="4%">hmain</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="5%">วันเกิด</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="5%">วันที่เริ่ม</th>
                
                </tr>
    </thead>
    <tbody id="getprubsitData">

            <tr>

            </tr>

    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    </section>

</center>

<script>
    var i = 0;
    function makeProgress(){
        if(i < 100){
            i = i + 1;
            $(".progress-bar").css("width", i + "%").text(i + " %");
        }

        setTimeout("makeProgress()", 100);
    }
    makeProgress();
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
