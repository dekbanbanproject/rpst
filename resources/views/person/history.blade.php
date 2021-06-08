@extends('layouts.admin')
@section('content')

    <div class="container-fluid">          
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">รายการค่าเช่าห้อง</h1>
            <a href="{{ url('person/per_index ')  }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> เก็บค่าเช่าห้อง</a>
    </div>                   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการค่าเช่าห้อง</h6>                                 
        </div>   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="5%">ลำดับ</th>                          
                            <th style="text-align: center;">เลขที่บิล</th>  
                            <th style="text-align: center;">วันที่</th>                           
                            <th style="text-align: center;">รวมยอดชำระ</th> 
                            <th style="text-align: center;">สถานะชำระ</th>                                                                                                                  
                            <th style="text-align: center;"width="10%">จัดการ</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($pers as $per)
                        <?php $number++; 
                            $status =  $per -> RENT_PAY_STATUS;

                            if( $status === 'PAID'){
                            $statuscol =  "badge badge-success";

                            }else if($status === 'UNPAID'){
                            $statuscol =  "badge badge-danger";
                           
                            }else{
                            $statuscol =  "badge badge-secondary";
                            } ?>
                                <tr>
                                    <td>{{ $number}}</td> 
                                    <td style="text-align: center;">{{$per->RENT_NO}}</td>    
                                    <td style="text-align: center;">{{$per->RENT_DATE}}</td>  
                                    <td style="text-align: center;">{{number_format($per->RENT_TOTAL_PRICE,2)}}</td> 
                                     <td class="text-font" align="center">
                                        <span class="{{$statuscol}}">{{$per->PAYSTATUS_NAME_TH}}</span>
                                    </td>   
                                    <td>   
                                        <a href="{{ url('person/rent_detail/'.$per->RENT_ID )  }}" class="btn btn-sm btn-info"><i class="fas fa-qrcode"></i></a>
                                        <a href="{{ url('person/history/history_destroy/'.$per->RENT_ID )  }}" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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