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
              <li class="breadcrumb-item active">Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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

<?php
        function DateThai($strDate)
        {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
        }
        function formate($strDate)
        {
        $strYear = date("Y",strtotime($strDate));
        $strMonth= date("m",strtotime($strDate));
        $strDay= date("d",strtotime($strDate));

        return $strDay."/".$strMonth."/".$strYear;
        }
        function formatetime($strtime)
        {
        $H = substr($strtime,0,5);
        return $H;
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
?>

  <section class="col-md-12">
            <div class="card-p shadow lg">
                <div class="card-header shadow lg">
                    <h6 class="float-sm-left  font-weight-bold text-primary">Supplier</h6>
                    <a href="{{ url('supplier/create/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-sm btn-success shadow-lg"><i class="fas fa-plus-circle text-white-90" style="font-size:15px "></i>&nbsp; เพิ่ม Supplier</a>
                </div>

                <div class="card-body shadow lg">
                    <table class="table table-hover" id="example1" width="100%" >
                            <thead>
                                <tr>
                                    <th style="text-align: center;color:#7B0099" width="3%">ลำดับ</th>
                                    <th style="text-align: center;color:#7B0099" width="20%">Supplier</th>
                                    <th style="text-align: center;color:#7B0099" width="12%">Mobile</th>
                                    <th style="text-align: center;color:#7B0099">ที่อยู่</th>
                                 
                                    <th style="text-align: center;color:#7B0099" width="15%">จัดการ</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php $number = 0; ?>
                        @foreach($allDatas as $item)
                        <?php $number++;  ?>
                                <tr class="">
                                    <td style="text-align: center;">{{$number}}</td>
                                    <td style="text-align: center;">{{$item->SUP_NAME}}</td>
                                    <td style="text-align: center;">{{$item->SUP_TEL}}</td>
                                    <td style="text-align: center;">{{$item->SUP_ADDRESS}}</td>
                                    <td style="text-align: center;">
                                        @if((Auth::user()->user_edit) == 'on' )
                                        <a href="{{ url('supplier/edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$item->SUP_ID )  }}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:orange'></i> </a>
                                        @endif
                                        @if((Auth::user()->user_delete) == 'on' ) 
                                        <a title="Delete" id="suppdelete" href="{{ url('supplier/sup_destroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$item->SUP_ID)}}" data-token="{{csrf_token()}}" data-id="{{$item->SUP_ID}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')"><i class="fas fa-fw fa-trash" style='font-size:15px;color:red'></i></a>
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
    </section>
    <!-- /.content -->

@endsection
