@extends('layouts.admin')
@section('content')

<div class="container-fluid">

   
    <!-- <p id="msg" class="alert alert-success"></p> -->

    <form method="post" action="{{route('Pro.product_save')}}" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <div class="card mb-3" style="max-width: 2350px;">
        <div class="row no-gutters">
            <div class="col-md-3">  <br>             
                <div class="form-group text-center">                   
                        <img src="{{ asset('img/camera.png')}}" id="add_upload_preview" alt="Image" class="img-thumbnail" style="height:300px; width:300px;">
                </div>
                <div class="form-group">
                        <input style="font-family: 'Kanit', sans-serif;" type="file" name="img" id="img" class="form-control input-sm" onchange="Changpic(this)">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="invalid-feedback">กรุณาเลือกภาพ</div>

                </div>
            </div>
        <div class="col-md-9">
            <div class="card-body">   
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">Product Code</label>
                            <input type="text" class="form-control"  id="product_code" name="product_code" required>
                            <div class="valid-feedback">
                                Product Code! 
                            </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Product Name</label>
                            <input class="form-control"id="product_name" name="product_name" required>
                            <div class="valid-feedback">
                                Product Name!
                            </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServerPrice">Price</label>
                            <input class="form-control" id="product_price" name="product_price" required>
                            <div class="valid-feedback">
                                Product Price!
                            </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">หน่วยนับ</label>                            
                        <select id="units_id" name="units_id" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;">
                            <option value="">--เลือกหน่วยนับ--</option>
                                @foreach ($units as $unit)                                           
                                        <option value="{{ $unit ->UNITS_ID }}">{{ $unit-> UNITS_NAME}}</option>
                                
                                @endforeach
                        </select>                                                    
                    </div> 
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">หมวดหมู่</label>                            
                        <select id="cats_id" name="cats_id" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
                            <option value="">--เลือกหมวดหมู่--</option>
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat ->CAT_ID }}">{{ $cat-> CAT_NAME}}</option>                                           
                                @endforeach
                        </select>  
                    </div>
                    <div class="col-md-4 mb-3">
                    
                    </div>
                </div>     
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>รายละเอียด</label>                            
                        <textarea class="form-control" id="description" name="description" row="3"> </textarea>                                      
                    </div>                     
                </div>                        
            </div>
        </div>
    </div>
</div>
<button class="btn btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;Save</button>
</form>
</div>

@endsection