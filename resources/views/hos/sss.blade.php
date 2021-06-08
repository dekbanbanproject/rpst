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
            <h6 class="float-sm-left  font-weight-bold text-primary">สิทธิ์ประกันสังคม</h6>

        <form action="{{route('hos.hdc')}}" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($items as $item)
                <input type="hidden" name="datasss_id[]" id="datasss_id" value="{{$item->cid}}">
                <input type="hidden" name="Purchase[]" id="SubInscl" value="{{ $item->Purchase }}">
                <input type="hidden" name="Province_Name[]" id="Province_Name" value="{{ $item->Province_Name }}">
                <input type="hidden" name="MainInscl[]" id="MainInscl" value="{{ $item->MainInscl }}">
                <input type="hidden" name="HMain[]" id="HMain" value="{{ $item->HMain }}">
                <input type="hidden" name="HSub[]" id="HSub" value="{{ $item->HSub }}">
                <input type="hidden" name="Tumbon_name[]" id="Tumbon_name" value="{{ $item->Tumbon_name }}">
                <input type="hidden" name="Moo[]" id="Moo" value="{{ $item->Moo }}">
                <input type="hidden" name="SubInscl[]" id="SubInscl" value="{{ $item->SubInscl }}">
                <input type="hidden" name="person_discharge_id[]" id="person_discharge_id" value="{{ $item->person_discharge_id }}">
                <input type="hidden" name="house_regist_type_id[]" id="house_regist_type_id" value="{{$item->house_regist_type_id }}">
                <input type="hidden" name="pttype_hospmain[]" id="pttype_hospmain" value="{{$item->pttype_hospmain }}">
                <input type="hidden" name="StartDate[]" id="StartDate"  value=" {{$item->StartDate}}">
                <input type="hidden" name="BirthDate[]" id="BirthDate"  value=" {{$item->BirthDate}}">
                <input type="hidden" name="Status[]" id="Status"  value=" {{$item->Status}}">
                <input type="hidden" name="Datenow[]" id="Datenow"  value=" {{ formate($date) }}">
                <input type="hidden" name="Lastupdate[]" id="Lastupdate"  value=" {{ formateDatetime($date) }}">
            @endforeach

             <div align="right">
                <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-3">
                        <select name="LOCATE_CODE" id="LOCATE_CODE" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                            <option value="">--เลือกสถานพยาบาล--</option>
                                @foreach ($tumbons as $tumbon)
                                    <option value="{{ $tumbon -> LOCATE_ID  }}">{{ $tumbon-> LOCATE_CODE}}&nbsp;&nbsp;{{ $tumbon-> LOCATE_NAME}}&nbsp;&nbsp;ตำบล&nbsp; {{ $tumbon-> LOCATE_TUMBON}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <span>
                            <select name="TYPE_NAME" id="TYPE_NAME" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                                <option value="">--เลือกสิทธิ์ในเขต--</option>
                                    @foreach ($Pttypes as $Pttype)
                                        <option value="{{ $Pttype -> pttype  }}">{{ $Pttype-> name}}</option>
                                    @endforeach
                            </select>
                            <div class="invalid-feedback">กรุณาเลือกสิทธิ์ในเขต</div>
                            <div class="valid-feedback"> สำเร็จ !! </div>
                        </span>
                    </div>
                    <div class="col-3">
                        <select name="HMAIN_CODE" id="HMAIN_CODE" class="form-control input-lg" style="font-family: 'Kanit', sans-serif; font-size: 13px;font-weight:normal;" required>
                            <option value="">--เลือกโรงพยาบาลแม่ข่าย--</option>
                                @foreach ($Hms as $Hm)
                                    <option value="{{ $Hm -> HMAIN_ID  }}">{{ $Hm-> HMAIN_CODE}}&nbsp;&nbsp;{{ $Hm-> HMAIN_NAME}}&nbsp;</option>
                                @endforeach
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
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="7%">วันหมดอายุ</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="2%">สิทธิ์เก่า</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="2%">สิทธิ์ใหม่</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="3%">Province</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="3%">Tumbon</th>
                    {{-- <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;">SubInscl_Name</th> --}}
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;"width="2%">HMain</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;"width="5%">BirthDate</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;"width="5%">วันที่เริ่ม</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;"width="7%">วันที่หมดอายุ</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="2%">discharge</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="2%">type</th>
                    <th class="text-font" style="border-color:#F0FFFF;text-align: center; font-size: 13px;font-weight:normal;" width="2%">Status</th>
        </tr>
    </thead>
    <tbody id="getprubsitData">
        <?php $number = 0; ?>
            @foreach ($items as $item)
                <?php $number++;  ?>
            <tr>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ $number}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ $item->cid}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ $item->Title}} {{ $item->Fname}}  {{ $item->Lname}} </td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ $item->pttype_hospmain}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{Datethai($item->birthdate) }}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ DateThai($item->pttype_begin_date)}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;">{{ DateThai($item->pttype_expire_date)}}</td>
                <td class="text-font" style="border-color:#B1FB17;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFD801;color:#696969;">{{ $item->pttype}}</td>
                <td class="text-font" style="border-color:#B1FB17;text-align: center; font-size: 13px;font-weight:normal;background-color:#B1FB17;color:#696969;">{{ $item->SubInscl}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->Province_Name}}</td>

                @if ($item->Tumbon_name == 'วังสามัคคี')
                    <td class="text-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFEBCD;color:#696969;">{{ $item->Tumbon_name }}</td>
                @else
                    <td class="txt-font" style="border-color:#FFF380;text-align: center; font-size: 13px;font-weight:normal;background-color:#FF2400;color:#FFF380;">{{ $item->Tumbon_name}}</td>
                @endif

                {{-- <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->SubInscl_Name}}</td> --}}
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->HMain}}</td>

                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ DateThai($item->BirthDate)}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ DateThai($item->StartDate)}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ DateThai($item->ExpDate)}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->person_discharge_id}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->house_regist_type_id}}</td>
                <td class="txt-font" style="border-color:#FFD801;text-align: center; font-size: 13px;font-weight:normal;background-color:#FFFFCC;color:#696969;">{{ $item->Status}}</td>
            </tr>
             @endforeach
    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    </section>

</center>
{{-- <script>
    $(document).ready(function(){
        $('form').ajaxForm({
            beforcSend:function(){
                $('#success').empty();
            },
            UploadProgress:function(event,position,total,percentComplete)
            {
               $('.progress-bar').text(percentComplete + '%');
               $('.progress-bar').css('width',percentComplete + '%');
            },
            if (data.errors)
            {
                $('.progress-bar').text('0%');
                $('.progress-bar').css('width','0%');
                $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
            }
            if (data.success)
            {
                $('.progress-bar').text('Finish');
                $('.progress-bar').css('width','100%');
                $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br/><br/>');
                $('#success').append(data.image);
            }
        });
    });
</script> --}}
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
