@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายการยา</h1>
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
                            <th style="text-align: center;">ลำดับ</th>                           
                            <th style="text-align: center;">icode</th> 
                            <th style="text-align: center;">รูปภาพ</th>  
                            <th style="text-align: center;">รายการยา</th> 
                            <th style="text-align: center;">หน่วยนับ</th> 
                            <th style="text-align: center;">ราคา</th> 
                            <th style="text-align: center;">หมวดหมู่</th> 
                            <th style="text-align: center;">รายละเอียด</th>                                                                                                                     
                            <th style="text-align: center;">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($Pros as $Pro)
                            <?php $number++;  ?>
                                <tr> 
                                    <td style="text-align: center;">{{ $number}}</td>                                 
                                    <td style="text-align: center;">{{$Pro->product_code}}<?php echo DNS1D::getBarcodeHTML($Pro->product_code, 'C128');  ?></td> 
                                    <td style="text-align: center;"><img src="{{ asset('img/product/' .$Pro->img)}}" alt="Image" class="img-thumbnail" style="height:70px; width:70px;"></td>
                                    <td style="text-align: center;">{{ $Pro->product_name}}</td>
                                    <td style="text-align: center;">{{ $Pro->UNITS_NAME}}</td>
                                    <td style="text-align: center;">{{ number_format($Pro->product_price,2)}}</td>
                                    <td style="text-align: center;">{{ $Pro->CAT_NAME}}</td>    
                                    <td style="text-align: center;">{{ $Pro->description}}</td>  
                                    <td style="text-align: center;"><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $Pro->id}}"><i class="fas fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $Pro->id}}"><i class="fas fa-print"></i></button>
                                        <!-- <button type="button" class="btn btn-sm btn-warning" ><i class="fas fa-fw fa-edit"></i></button> -->
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





@endsection