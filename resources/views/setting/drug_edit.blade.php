@extends('layouts.adminlte_medical')

@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
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
              <li class="breadcrumb-item active">แก้ไขรายการยา</li>
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
        .card-p{
            margin-left: 80px;
            margin-right: 80px;
        }
        .content-header{
            margin-left: 80px;
            margin-right: 80px;
        }
      </style>
<section class="col-md-12">
    <div class="card-p shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">แก้ไขรายการยา</h5>
            <a href="{{ url('setting/drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>
        </div>

            <div class="card-body shadow lg">
            <form action="{{ route('setting.drug_update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="DRUG_ID" value="{{$drugs->DRUG_ID }}">
                                <input type="hidden" name ="idstore" id="idstore" value="{{ Auth::user()->store_id }}" class="form-control" >
                                <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-6"><br>
                                        <div class="form-group">
                                            <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>

                                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($drugs->DRUG_IMG)) }}" id="add_preview" alt="Image" class="img-thumbnail" style="height:260px; width:270px;">
                                        </div>
                                        <div class="form-group">
                                            <input style="font-family: 'Kanit', sans-serif;" type="file" name="DRUG_IMG" id="DRUG_IMG" class="form-control input-sm" onchange="addURL(this)" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                    <label for="drug_code">Icode :</label>
                                        <input name ="DRUG_CODE" id="drug_code" class="form-control" value="{{ $drugs ->DRUG_CODE }}" required> <br>

                                        <label for="drug_name">รายการยา :</label>
                                        <input name ="DRUG_NAME" id="drug_name" class="form-control" value="{{ $drugs ->DRUG_NAME }}" required> <br>

                                            <label for="DRUG_UNIT">หน่วยนับ :</label>
                                        <select name ="DRUG_UNIT" id="DRUG_UNIT" class="form-control">
                                            <option value="">เลือก</option>
                                                @foreach ($units as $unit)
                                                @if($drugs->DRUG_UNIT == $unit->UNIT_ID)
                                                    <option value="{{ $unit ->UNIT_ID }}" selected>{{ $unit->UNIT_NAME}}</option>
                                                    @else
                                                    <option value="{{ $unit ->UNIT_ID }}">{{ $unit->UNIT_NAME}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                            <br>

                                        <label for="DRUG_CAT">หมวดหมู่ :</label>
                                        <select name ="DRUG_CAT" id="DRUG_CAT" class="form-control">
                                            <option value="">เลือก</option>
                                                @foreach ($cats as $cat)
                                                @if($drugs->CAT_ID == $cat->CAT_ID)
                                                    <option value="{{ $cat ->CAT_ID }}" selected>{{ $cat->CAT_NAME}}</option>
                                                    @else
                                                    <option value="{{ $cat ->CAT_ID }}">{{ $cat->CAT_NAME}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
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
