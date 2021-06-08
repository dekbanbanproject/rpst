@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ตัวแทนจำหน่าย</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มตัวแทนจำหน่าย</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการตัวแทนจำหน่าย</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>                           
                            <th>ชื่อตัวแทนจำหน่าย</th>   
                            <th>เบอร์โทร</th>  
                            <th>Line Token</th>                                                                                                                     
                            <th>จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($supps as $supp)
                            <?php $number++;  ?>
                                <tr>
                                    <td>{{ $number}}</td>                             
                                    <td>{{ $supp->SUP_NAME}}</td>  
                                    <td>{{ $supp->SUP_TEL}}</td>
                                    <td>{{ $supp->SUP_LINETOKEN}}</td>      
                                    <td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditQRCODE{{ $supp->SUP_ID}}"><i class="fas fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#printQRCODE{{ $supp->SUP_ID}}"><i class="fas fa-print"></i></button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $supp->SUP_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <a href="{{ url('products/supplies/destroy/'.$supp->SUP_ID )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                       

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$supp->SUP_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('P.updatesupplies') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">Edit Supplies</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit">Edit </button>
                                        </div>
                                        <div class="modal-body">                   
                                                <div class="row push">                                                                              
                                                    <div class="col-md-2 text-right">
                                                        ชื่อตัวแทนจำหน่าย : 
                                                    </div>
                                                    <div class="col-md-4">                            
                                                        <input value="{{$supp->SUP_NAME}}" name ="SUP_NAME" id="SUP_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                                                    </div> 
                                                    <div class="col-md-2 text-right">
                                                        เบอร์โทร : 
                                                    </div>  
                                                    <div class="col-md-4">
                                                        <input value="{{$supp->SUP_TEL}}" name ="SUP_TEL" id="SUP_TEL" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                    </div>  
                                                </div>
                                                <br>
                                                <div class="row push"> 
                                                    <div class="col-md-2 text-right">
                                                        Line Token : 
                                                    </div>  
                                                    <div class="col-md-10">
                                                        <input value="{{$supp->SUP_LINETOKEN}}" name ="SUP_LINETOKEN" id="SUP_LINETOKEN" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                                                    </div>                            
                                                </div> 
                                            <br>
                                            <input type="hidden" value="{{$supp->SUP_ID}}" name ="SUP_ID" id="SUP_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;"> 
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
            <form action="{{ route('P.savesupplies') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">Add Supplies</h4>                   
                    <button class="btn btn-sm btn-info" type="submit">Add </button>
                </div>
                <div class="modal-body">                   
                    <div class="row push">                                                                              
                        <div class="col-md-2 text-right">
                                ชื่อตัวแทนจำหน่าย : 
                        </div>
                        <div class="col-md-4">                            
                            <input name ="SUP_NAME" id="SUP_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                        </div> 
                        <div class="col-md-2 text-right">
                        เบอร์โทร : 
                        </div>  
                        <div class="col-md-4">
                        <input name ="SUP_TEL" id="SUP_TEL" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
                        </div> 
                    </div> 
                    <br>
                    <div class="row push"> 
                        <div class="col-md-2 text-right">
                        Line Token : 
                        </div>  
                        <div class="col-md-10">
                        <input name ="SUP_LINETOKEN" id="SUP_LINETOKEN" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">
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