@extends('layouts.adminlte_home')

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
        margin-left: 200px;
        margin-right: 200px;
    }
    .content-header{
        margin-left: 200px;
        margin-right: 200px;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card-p card-info">
                  <div class="card-header shadow lg">
                    <h3 class="card-title">เพิ่มรายชื่อ <small>เจ้าหน้าที่</small></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('staff.store') }}" role="form" id="quickForm"  method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body shadow lg">
                    <div class="form-row">
                            <div class="col-sm-4 text-left">
                                <div class="form-group">
                                    <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                    <img src="{{ asset('img/person/dafault.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:250px; width:260px;">
                                </div>
                                <div class="form-group">
                                    <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="readURL(this)" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                </div>
                            </div>
                        <div class="col-sm-8">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>

                              </div>
                              <div class="form-group col-md-6">
                                <label for="lname">lastname</label>
                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter lastname" >

                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>

                              </div>
                              <div class="form-group col-md-6">
                                <label for="facebook">facebook</label>
                                <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter facebook" >

                              </div>
                              <div class="form-group col-md-6">
                                <label for="cid">เลขบัตรประชาชน</label>
                                <input type="text" name="cid" class="form-control" id="cid" placeholder="Enter Line Token" required>

                              </div>
                              <div class="form-group col-md-6">
                                <label for="position">ตำแหน่ง</label>

                                <select name ="position" id="position" class="form-control">
                                    <option value="">เลือก</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position ->POSITION_ID }}">{{ $position->POSITION_NAME}}</option>
                                        @endforeach
                                </select>
                              </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>

                                </div>
                    @if((Auth::user()->status) == 'SUPER_ADMIN')
                                <div class="form-group col-md-6">
                                  <label for="status">STATUS</label>
                                  <select type="text" name="status" class="form-control" id="status"  >
                                    <option value="" >เลือก</option>
                                    <option value="USER" >USER</option>
                                    <option value="STAFF" >STAFF</option>
                                    <option value="ADMIN" >ADMIN</option>
                                  </select>
                                </div>
                    @endif
                                <div class="form-group col-md-6">
                                <label for="STORE">Store</label>
                                <select name ="STORE" id="STORE" class="form-control">
                                            <option value="">เลือก</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store ->LOCATE_ID }}">{{ $store->LOCATE_NAME}}</option>
                                                @endforeach
                                        </select>

                                        </div>
                                <div class="form-group col-md-6">
                                <label for="linetoken">Line Token</label>
                                <input type="text" name="linetoken" class="form-control" id="linetoken" placeholder="Enter Line Token">

                              </div>
                            </div>
                    </div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer shadow lg">
                        <div align="right">
                      <button type="submit" class="btn btn-info"><i class='fas fa-save' style='font-size:24px;color:white'></i>&nbsp;&nbsp;บันทึก</button>
                      <a href="{{ url('staff/index')}}" class="btn btn-danger" data-dismiss="modal"><i class='fas fa-door-closed' style='font-size:24px;color:white'></i>&nbsp;&nbsp;Close</a>
                    </div>
                </div>
                  </form>
                </div>
                <!-- /.card -->
                </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">

              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
<br>
        <script>
        function readURL(input) {
            var fileInput = document.getElementById('img');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#add_upload_preview').attr('src', e.target.result);
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
