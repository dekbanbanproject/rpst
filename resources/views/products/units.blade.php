@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">หน่วยนับ</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มหน่วยนับ</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการหน่วยนับ</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>                           
                            <th>ชื่อหน่วยนับ</th>                                                                                                                      
                            <th>จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($units as $unit)
                            <?php $number++;  ?>
                                <tr>
                                    <td>{{ $number}}</td>                             
                                    <td>{{ $unit->UNITS_NAME}}</td>        
                                    <td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $unit->UNITS_ID}}"><i class="fas fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $unit->UNITS_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $unit->UNITS_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/units/destroy/'.$unit->UNITS_ID )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                       

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$unit->UNITS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('P.updateunits') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">Edit Units</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit">Edit </button>
                                        </div>
                                        <div class="modal-body">                   
                                                <div class="row push">
                                                    <div class="col-md-2">
                                                    
                                                    </div>                            
                                                    <div class="col-md-2 text-right">
                                                    ชื่อหน่วยนับ : 
                                                    </div>
                                                    <div class="col-md-4">                            
                                                        <input value="{{$unit->UNITS_NAME}}" name ="UNITS_NAME" id="UNITS_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                                                    </div>  
                                                    <div class="col-md-4">
                                                    
                                                    </div>                            
                                                </div> 
                                            <br>
                                            <input type="hidden" value="{{$unit->UNITS_ID}}" name ="UNITS_ID" id="UNITS_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;"> 
                                        <div class="modal-footer">
                                            
                                        </div>
                                </div>
                                </form> 
                                
                            </div>
                        </div>
                        </div>

                        @endforeach                                                  
                    </tbody>
                </table>     
            </div>
        </div>
    </div>
</div> 
</div>

<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{ route('P.saveunits') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">Add Units</h4>                   
                    <button class="btn btn-sm btn-info" type="submit">Add </button>
                </div>
                <div class="modal-body">                   
                        <div class="row push">
                            <div class="col-md-2">
                               
                            </div>                            
                            <div class="col-md-2 text-right">
                               ชื่อหน่วยนับ : 
                            </div>
                            <div class="col-md-4">                            
                                <input name ="UNITS_NAME" id="UNITS_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                            </div>  
                            <div class="col-md-4">
                               
                            </div>                            
                        </div> 
                    <br>
                <div class="modal-footer">
                    
                </div>
           </div>
        </form> 
        
     </div>
 </div>
</div>









@endsection