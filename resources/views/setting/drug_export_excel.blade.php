<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="clinic_recieve_store.xls"');//ชื่อไฟล์

function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
  }

  function getAge($birthday) {
    $then = strtotime($birthday);
    return(floor((time()-$then)/31556926));
}
$date = date('Y-m-d');

use App\Http\Controllers\ClinicsettingController;
use App\Http\Controllers\HosController;
?>

<table class="table table-hover" style="width: 100%">
    <thead>
        <tr>
            <th width="3%">STORE_RECIEVE_ID</th>
            <th  width="15%">REC_ID</th>
            <th  >STORE_RECIEVE_DRUG_ID</th>
            <th  width="10%">STORE_RECIEVE_DRUG_CODE</th>
            <th  width="10%">STORE_RECIEVE_DRUG_NAME</th>
            <th width="10%">STORE_RECIEVE_DRUG_UNIT</th>
            <th  width="10%">STORE_RECIEVE_DRUG_QTY</th>
            <th  width="10%">STORE_RECIEVE_DRUG_PRICE</th>
            <th  width="10%">STORE_RECIEVE_DRUG_TOTAL</th>
            <th  width="18%">STORE_RECIEVE_DRUG_LOT</th>
            <th  width="18%">STORE_LOCATE_ID</th>
            <th  width="18%">STORE_RECIEVE_DRUG_LOT</th>
            <th  width="18%">STORE_RECIEVE_DRUG_DATE_BEGIN</th>
            <th  width="18%">STORE_RECIEVE_DRUG_DATE_EXP</th>
            <th  width="18%">created_at</th>
            <th  width="18%">updated_at</th>
        </tr>
    </thead>
    <tbody>
        <?php $number = 0; ?>
            @foreach ($drugs as $drug)         
                <?php $number++;  ?>
                <tr>
                    <td >{{ $number}}</td>
                    <td >1</td>
                    <td >{{ $drug->DRUG_ID}}</td>
                    <td >{{ $drug->DRUG_CODE}}</td>
                    <td >{{ $drug->DRUG_NAME}}</td>
                    <td >{{ $drug->UNIT_NAME}}</td>
                    <td >{{number_format(ClinicsettingController::sumdrughos_qty($drug->DRUG_CODE)) }}</td>
                    <td >{{ $drug->DRUG_UNIT_PRICE_COST}}</td>
                    <td >{{number_format(ClinicsettingController::sumdrughos_totalpricehos($drug->DRUG_CODE)) }}</td>
                    <td >1001</td>
                    <td >0</td>
                    <td >0</td>
                    <td ></td>
                    <td ></td>
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
    <tr>
        <td></td><td></td><td></td><td></td><td></td>
        <td align="center" style="color: orangered;font-size:25px;"><b>Total</b></td>
     
    </tr>
</table>
