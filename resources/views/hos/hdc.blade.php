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
        function formatetime($strtime)
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
        <form action="{{route('hos.hdc')}}" method="post" enctype="multipart/form-data">
            <h6 class="float-sm-left  font-weight-bold text-primary">รายชื่อ Person Hdc</h6>

             <div align="right">
                    <button type="submit" class="btn btn-sm btn-info shadow-lg">&nbsp;<i class="fas fa-download text-white-90" style="font-size:15px "></i>&nbsp;&nbsp;&nbsp; นำเข้า</button>&nbsp;&nbsp;
             </div>
        </div>
    </form>
        <div class="card-body shadow lg">
        <table class="table table-hover" id="example1" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099" width="2%">ลำดับ</th>
                            <th style="text-align: center;color:#7B0099" width="7%">vn</th>
                            <th style="text-align: center;color:#7B0099" >รายการยา</th>
                            <th style="text-align: center;color:#7B0099" width="15%">ความแร็ง</th>
                            <th style="text-align: center;color:#7B0099" width="15%">หน่วยนับ</th>
                            <th style="text-align: center;color:#7B0099" width="7%">ราคา</th>
                            <th style="text-align: center;color:#7B0099" width="10%">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 0; ?>
                        @foreach ($pers as $per)
                            <?php $number++;  ?>
                                <tr>
                                    <td>{{ $number}}</td>
                                    <td>{{$per->cid }}</td>
                                    <td>{{$per->pname }}</td>
                                    <td>{{$per->fname }}</td>
                                    <td>{{$per->lname }}</td>
                                    <td>{{$per->house_regist_type_id }}</td>
                                    <td>{{$per->death }}</td>
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
