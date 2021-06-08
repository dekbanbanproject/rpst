@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">หมายเลขห้อง</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มหมายเลขห้อง</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการหมายเลขห้อง</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="5%">ลำดับ</th>                          
                            <th style="text-align: center;">หมายเลขห้อง</th>  
                            <!-- <th style="text-align: center;">ชื่อ-นามสกุล</th>                                                                                                                      -->
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($rooms as $room)
                            <?php $number++;  ?>
                                <tr>
                                <input type="hidden" class="deleteID" value="{{ $room->ROOM_ID }}">
                                    <td>{{ $number}}</td> 
                                    <td style="text-align: center;">{{$room->ROOM_NAME}}<?php echo DNS1D::getBarcodeHTML($room->ROOM_NAME, 'C128');  ?></td>  
                                    <!-- <td style="text-align: center;">{{$room->PERSON_FNAME}}&nbsp;&nbsp; {{$room->PERSON_LNAME}}</td>     -->
                                    <td>        
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $room->ROOM_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <!-- <a href="{{ url('person/room/room_destroy/'.$room->ROOM_ID )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <button type="button" class="btn btn-sm btn-danger deleteRoom"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>
                                </tr>
                       

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$room->ROOM_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('Per.room_update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">แก้ไขหมายเลขห้อง</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                                        </div>
                                        <div class="modal-body">                   
                                                <div class="row push">
                                                    <div class="col-md-2">
                                                    
                                                    </div>                            
                                                    <div class="col-md-2 text-right">
                                                    หมายเลขห้อง : 
                                                    </div>
                                                    <div class="col-md-4">                            
                                                        <input value="{{$room->ROOM_NAME}}" name ="ROOM_NAME" id="ROOM_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                                                    </div>  
                                                    <div class="col-md-4">
                                                    
                                                    </div>                            
                                                </div> 
                                            <br>
                                            <input type="hidden" value="{{$room->ROOM_ID}}" name ="ROOM_ID" id="ROOM_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;"> 
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
            <form action="{{ route('Per.room_save') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">เพิ่มหมายเลขห้อง</h4>                   
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                </div>
                <div class="modal-body">                   
                        <div class="row push">
                            <div class="col-md-2">
                               
                            </div>                            
                            <div class="col-md-2 text-right">
                               หมายเลขห้อง : 
                            </div>
                            <div class="col-md-4">                            
                                <input name ="ROOM_NAME" id="ROOM_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
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