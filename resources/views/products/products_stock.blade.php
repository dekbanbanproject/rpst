@extends('layouts.admin')
@section('content')

<div class="container-fluid">

 
<form method="post" action="{{url('add-cart')}}" name="addtocartForm" id="addtocartForm" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
    <div class="card mb-3" style="max-width: 2350px;">
        <div class="row no-gutters">
            <div class="col-md-3">             
              
            </div>
            <div class="col-md-9">
                <div class="card-body">   
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                                <input type="text" class="form-control"  id="pro_code" name="pro_code" required>
                                <div class="valid-feedback">
                                    Product Code! 
                                </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Product Name</label>
                            <input class="form-control"id="pro_name" name="pro_name" required>
                            <div class="valid-feedback">
                                Product Name!
                            </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label id="getPrice">Price</label>
                            <input class="form-control" id="pro_price" name="pro_price" required>
                            <div class="valid-feedback">
                                Product Price!
                            </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationServerPrice">QTY</label>
                            <input class="form-control" id="qty" name="qty" required>
                            <div class="valid-feedback">
                                Product QTY!
                            </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                       
                    </div> 
                    <div class="col-md-4 mb-3">
                       
                    </div>
                    <div class="col-md-4 mb-3">
                    
                    </div>
                </div>     
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                                                           
                    </div>                     
                </div>                        
            </div>
        </div>
    </div>
    <div class="row" > 
        <div class="col-12">                          
                <div class="card-body" style="width: 100%;margin:2px;2px;2px;2px;" >                           
                    <div class="block block-rounded block-bordered">
                        <ul class="nav nav-tabs nav-tabs-info" data-toggle="tabs" role="tablist" style="background-color: rgb(255,12,93);">
                            <li class="nav-item">
                                <a class="nav-link active" href="#object1" style="font-family: 'Kanit', sans-serif; font-size:12px;font-size: 1.0rem;font-weight:normal;">รายการสินค้า</a>
                            </li>  
                        </ul>
                            <div class="block-content tab-content">
                            <div class="tab-pane active" id="object1" role="tabpanel">  
                                    <table class="table-bordered table-striped table-vcenter" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center;" width="5%">ลำดับ</td>
                                                <td style="text-align: center;" width="30%">รายการยา</td>  
                                                <td style="text-align: center;" width="15%">ราคา</td> 
                                                <td style="text-align: center;" width="7%">จำนวน</td> 
                                                
                                                <td style="text-align: center;" width="5%"><a  class="btn btn-sm btn-success addRow1" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a></td>
                                            </tr>
                                        </thead> 
                                        <tbody class="tbody1"> 
                                                <tr>
                                                    <td style="text-align: center;"> 1 </td>
                                                    <td> 
                                                    <select name="product_id[]" id="product_id[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                        <option value="">--เลือก--</option> 
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product -> id }}">{{ $product-> product_code}}&nbsp;&nbsp;{{ $product-> product_name}}</option>
                                                        @endforeach                                                                                                                                                                    
                                                    </select>
                                                    </td>                                         
                                                    <td>
                                                        <input name="product_price[]" id="product_price[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                    </td>
                                                    <td>
                                                        <input name="recieve_qty[]" id="recieve_qty[]" class="form-control" style=" font-family: 'Kanit', sans-serif;">
                                                    </td>                                                   
                                                    <td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>
                                                </tr>                                                                 
                                        </tbody>   
                                    </table>
                                    
                                    <div class="row justify-content-between">
                                            
                                </div>
                                    
                                </div>
                            </div>
                        </div>                
                    </div>
                                                        
                </div>
                </div>
               
</div>
<button class="btn btn-success" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;Save</button>
</form>
</div>

<div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      
        <!-- <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มรายการยา</a> -->
        &nbsp;&nbsp;<a href="{{ url('products/pdf/productspdf')}}" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> Print</a>
        &nbsp;&nbsp;<a href="{{ url('products/pro_add')}}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่ม</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการยา</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="7%">ลำดับ</th>                           
                            <th style="text-align: center;"width="15%">icode</th> 
                            <th style="text-align: center;">รายการยา</th> 
                            <th style="text-align: center;">ราคา</th> 
                            <th style="text-align: center;">QTY</th>                                                                     
                            <th style="text-align: center;" width="7%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($Pros as $Pro)
                            <?php $number++;  ?>
                                <tr> 
                                    <td style="text-align: center;">{{ $number}}</td>                                 
                                    <td style="text-align: ;">{{$Pro->pro_code}}<?php echo DNS1D::getBarcodeHTML($Pro->pro_code, 'C128');  ?></td> 
                                    <td style="text-align: center;">{{ $Pro->pro_name}}</td>
                                    <td style="text-align: center;">{{ number_format($Pro->pro_price,2)}}</td>

                                    @if($Pro->qty < 5)                                      
                                    <td class="text-font" style="border-color:#F7FA1B;text-align: center; font-size: 20px;font-weight:normal;background-color:#F7FA1B;color:#FA651B;"><b>{{ $Pro->qty}}</b></td> 
                                    @else
                                        <td style="text-align: center;">{{ $Pro->qty}}</td> 
                                    @endif

                                    <td style="text-align: center;">                                   
                                        <a href="{{ url('products/pro_edit/'.$Pro->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="{{ url('products/destroy/'.$Pro->id )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>                      

                        @endforeach                                                  
                    </tbody>
                </table>     
            </div>
        </div>
    </div>
</div> 
</div>

<script src="{{ asset('static/vendor/jquery/jquery.min.js') }}"></script>

<script>

    $('.addRow1').on('click',function(){
         addRow1();
     });
     function addRow1(){
        var count = $('.tbody1').children('tr').length;
        var tr ='<tr>'+
                '<td style="text-align: center;">'+
                (count+1)+
                '</td>'+
                '<td>'+ 
                '<select name="product_id[]" id="product_id[]" class="form-control" style=" font-family: \'Kanit\', sans-serif;">'+
                '<option value="">--เลือก--</option>'+ 
                '@foreach ($products as $product)'+
                '<option value="{{ $product -> id }}">{{ $product-> product_code}}&nbsp;&nbsp;{{ $product-> product_name}}</option>'+
                '@endforeach '+                                                                                                                                                                   
                '</select>'+
                '</td>'+
                '<td>'+
                '<input name="product_price[]" id="product_price[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+
                '<td>'+
                '<input name="recieve_qty[]" id="recieve_qty[]" class="form-control input-sm" style=" font-family: \'Kanit\', sans-serif;">'+
                '</td>'+ 
                '<td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove1" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };
  
     $('.tbody1').on('click','.remove1', function(){
            $(this).parent().parent().remove(); 
                
     });

</script>
@endsection