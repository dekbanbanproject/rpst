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
              <li class="breadcrumb-item active">เพิ่มรายการยา</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="col-md-12">
    <div class="card-p shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">เพิ่มรายการยา</h5>
            <a href="{{ url('setting/drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>
        </div>

            <div class="card-body shadow lg">
            <form action="{{ route('setting.drug_save')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                                <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >
                                
                                <div class="form-row">
                                    <div class="col-md-6 mb-6"><br>
                                        <div class="form-group">
                                            <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                            <img src="{{ asset('img/person/dafault.png')}}" id="add_preview" alt="Image" class="img-thumbnail" style="height:260px; width:270px;">
                                        </div>
                                        <div class="form-group">
                                            <input style="font-family: 'Kanit', sans-serif;" type="file" name="DRUG_IMG" id="DRUG_IMG" class="form-control input-sm" onchange="addURL(this)" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="drugcode">Icode :</label>
                                                <input type="text"name ="DRUG_CODE" id="drugcode" class="form-control" required>

                                            </div>
                                            <div class="col-md-12">
                                                <label for="drug_name">รายการยา :</label>
                                                <input name ="DRUG_NAME" id="drug_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="drug_unit">หน่วยนับ :</label>
                                                <select name ="DRUG_UNIT" id="drug_unit" class="form-control" required>
                                                    <option value="">เลือก</option>
                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit ->UNIT_ID }}">{{ $unit->UNIT_NAME}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="DRUG_CAT">หมวดหมู่ :</label>
                                                <select name ="DRUG_CAT" id="DRUG_CAT" class="form-control" >
                                                    <option value="">เลือก</option>
                                                        @foreach ($cats as $cat)
                                                            <option value="{{ $cat ->CAT_ID }}">{{ $cat->CAT_NAME}}</option>
                                                        @endforeach
                                                </select>
                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </div>

                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 mb-10 text-right">
                                <!-- <h5>ค้นหารายชื่อผู้ป่วย</h5> -->
                            </div>

                            <div class="col-md-2 mb-2">
                            <button class="float-sm-right btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>
<script>
        function addURL(input) {
            var fileInput = document.getElementById('DRUG_IMG');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#add_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
            }
</script>

@endsection
