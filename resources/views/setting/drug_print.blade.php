<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/w3.css') }}"> --}}
</head>
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

        use App\Http\Controllers\ClinicsettingController;
        use App\Http\Controllers\HosController;
?>

<body>

<div class="container-fluid">
    <br>
    <form action="">
        <div align="center">&nbsp;&nbsp;&nbsp;
            <label for="" style='font-size:30px;color:rgba(22, 117, 241, 0.979)'>รายการยาทั้งหมด</label>


        <section class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h6 class="float-sm-left font-weight-bold " style='font-size:20px;color:rgba(250, 68, 12, 0.979)'>{{$stores->LOCATE_NAME}}</h6>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                    <h6 class="float-sm-right font-weight-bold " style='font-size:20px;color:rgba(250, 68, 12, 0.979)'> {{DateThai(date('Y-m-d'))}}</h6>
                    <a href="{{url('setting/drug_export_excel/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class=" btn btn-sm btn-success shadow-lg"><i class="fas fa-file-excel text-white-90" style="font-size:15px "></i>&nbsp;&nbsp; Export Excel</a>&nbsp;&nbsp;
                  
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="example1" width="100%" >
                        <thead>
                            <tr>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)"width="3%">ลำดับ</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="15%">รหัสยา</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" >รานการยา</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">หน่วยนับ</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">ราคาต้นทุน</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">ราคา</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">รับเข้า</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">เบิก-จ่าย</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="10%">สต็อค</th>
                                <th style="text-align: center;color:rgba(22, 117, 241, 0.979)" width="18%">24 หลัก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 0; ?>
                                @foreach ($drugs as $drug)
                                    <?php $number++;  ?>
                                    <tr>
                                        <td style="text-align: center;">{{ $number}}</td>
                                        <td style="text-align: center;">{{ $drug->DRUG_CODE}}</td>
                                        <td style="text-align: left;">{{ $drug->DRUG_NAME}}</td>
                                        <td style="text-align: center;">{{ $drug->UNIT_NAME}}</td>
                                        <td style="text-align: center;">{{ $drug->DRUG_UNIT_PRICE_COST}}</td>
                                        <td style="text-align: center;">{{ $drug->DRUG_UNIT_PRICE}}</td>
                                        <td style="text-align: center;">{{number_format(ClinicsettingController::sumrecieve($drug->DRUG_ID))}}</td>
                                        <td style="text-align: center;">{{number_format(ClinicsettingController::sumpay($drug->DRUG_ID))}}</td>
                                        <td style="text-align: center;">{{number_format(ClinicsettingController::sumdrughos_qty($drug->DRUG_CODE))}}</td>
                                        <td style="text-align: center;">{{ $drug->DRUG_DID}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                        </tbody>
                    </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <hr>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <td> <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>รับเข้า :</label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(253, 63, 15, 0.979)'>{{number_format($sumtprice_recs),2}} </label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>บาท</label>
                     </td>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <td> <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>เบิก-จ่าย :</label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(253, 63, 15, 0.979)'>{{number_format($sumtprice_pays),2}} </label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>บาท</label>
                     </td>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <td> <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>ยอดรวมคงเหลือ :</label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(253, 63, 15, 0.979)'>{{number_format($sumtotals),2}} </label>&nbsp;&nbsp;
                        <label for="" style='font-size:30px;color:rgba(17, 16, 16, 0.979)'>บาท</label>
                     </td>
                    <br>




                </div>
            </div>
            </div>
            <div align="center">


            </div>
        </section>
    </form>
</div>
    <div align="right">
        <button type="button" id="print" class="btn btn-info"><i class="fas fa-print" style='font-size:20px;color:rgb(255, 255, 255)'></i>&nbsp;&nbsp;Print</button>
        <a href="{{ url('setting/drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="btn btn-danger" data-dismiss="modal"><i class='fas fa-door-closed' style='font-size:20px;color:white'></i>&nbsp;&nbsp;Close</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    </div>

</div>

<br><br><br>


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/printThis.js') }}"></script>

    <script>
        $('#print').click(function(){
            $('.container-fluid').printThis();
        })
    </script>
</body>
</html>
