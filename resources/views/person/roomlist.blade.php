@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">หมายเลขห้อง</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus fa-sm text-white-50" ></i> เพิ่มรายการชำระ</a>
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
                            <th style="text-align: center;">รายการชำระ</th>                                                                                                                                           
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($rooms as $room)
                            <?php $number++;  ?>
                                <tr>
                                <input type="hidden" class="deleteID" value="{{ $room->LIST_ID }}">
                                    <td>{{ $number}}</td> 
                                    <td style="text-align: center;">{{$room->LIST_NAME}}</td>                                           
                                    <td>        
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal{{ $room->LIST_ID}}"><i class="fas fa-fw fa-edit"></i></button>
                                        <!-- <a href="{{ url('person/roomlist/roomlist_destroy/'.$room->LIST_ID )  }}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบ &nbsp;{{$room->LIST_NAME}} ใช่หรือไม่ ?')"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <button type="button" class="btn btn-sm btn-danger deleteRoomlist"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>
                                </tr>
                       

                        <!-- EDit/.largeModal-->
                        <div class="modal fade" id="EditModal{{$room->LIST_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('Per.roomlist_update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-header">                 
                                        <h4 class="modal-title ">แก้ไขรายการชำระ</h4>                   
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                                        </div>
                                        <div class="modal-body">                   
                                                <div class="row push">
                                                    <div class="col-md-1">
                                                   
                                                    </div>   
                                                    <div class="col-md-2">
                                                   </div>                           
                                                    <div class="col-md-2 text-right">
                                                    รายการชำระ : 
                                                    </div>
                                                    <div class="col-md-4">                            
                                                    <input value="{{$room->LIST_NAME}}" name ="LIST_NAME" id="LIST_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                                                   
                                                    </div>  
                                                    <div class="col-md-1 text-right">
                                                  
                                                    </div>
                                                    <div class="col-md-2">
                                                    
                                                    </div>                            
                                                </div> 
                                            <br>
                                            <input type="hidden" value="{{$room->LIST_ID}}" name ="LIST_ID" id="LIST_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;"> 
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('Per.roomlist_save') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-header">                 
                <h4 class="modal-title ">เพิ่มรายการชำระ</h4>                   
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save fa-sm text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;บันทึก </button>
                </div>
                <div class="modal-body">                   
                    <div class="row push">
                        <div class="col-md-1">                     
                        </div>                                                  
                        <div class="col-md-2 text-right">
                        รายการชำระ :
                        </div>
                        <div class="col-md-7">                            
                            <input name ="LIST_NAME" id="LIST_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;">                            
                        </div> 
                        <div class="col-md-2 ">                       
                        </div>                                                  
                    </div> 
                    <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-door-closed text-white-50" style="font-size:24px "></i>&nbsp;&nbsp;ปิด</button>
                </div>
           </div>
     </div>
     </form> 
 </div>

</div>

<script> 
    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
    }
 
</script>







@endsection