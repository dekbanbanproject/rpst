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
            <h1 class="m-0 text-dark">Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">แก้ไข Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="col-md-12">
    <div class="card-p shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">แก้ไข Supplier</h5>
            <a href="{{ url('supplier/supindex/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>
        </div>


            <div class="card-body shadow lg ">
            <form action="{{url('supplier/update/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$data->SUP_ID)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                            <div class="form-row">

                                    <div class="form-group col-md-8 mb-8 text-left">
                                        <label for="sup_name">ชื่อ Supplier</label>
                                        <input value="{{$data->SUP_NAME }}" name ="sup_name" id="sup_name" class="form-control" required>
                                        <div class="invalid-feedback"> กรอกชื่อ Supplier</div>
                                    </div>
                                    <div class="form-group col-md-4 mb-4 text-left">
                                        <label for="sup_tel">เบอร์โทร</label>
                                        <input value="{{$data->SUP_TEL }}" name ="sup_tel" id="sup_tel" class="form-control" required>
                                        <div class="invalid-feedback"> กรอกเบอร์โทร</div>
                                    </div>

                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-12 mb-12 text-left">
                                        <label for="sup_address">ที่อยู่</label>
                                       <textarea name="sup_address" id="sup_address" class="form-control" rows="4" required>{{$data->SUP_ADDRESS }}</textarea>
                                       <div class="invalid-feedback">กรอกที่อยู่ </div>
                                    </div>
                            </div>
                        </div>

                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 mb-10 text-right">
                            </div>

                            <div class="col-md-2 mb-2">
                            <input class="float-sm-right btn btn-info" type="submit"  value="Update"><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp; </input>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="{{ asset('function/function.js') }}"></script> -->
</section>
@endsection
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules:{
                sup_name:{
                    required:true,
                },
                sup_tel:{
                    required:true,
                },
                sup_address:{
                    required:true,
                }
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement:function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element,errorClass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element,errorClass,validClass){
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
