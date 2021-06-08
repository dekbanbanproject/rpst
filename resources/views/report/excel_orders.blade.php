<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="INFOMATION_PERSON.xls"');//ชื่อไฟล์

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

?>

<table class="table table-hover" style="width: 100%">
    <thead>
        <tr>
            <th align="center" width="5%">ลำดับ</th>
            <th >icode</th>
            <th >รายการยา</th>
            <th >จำนวน</th>
            <th >หน่วย</th>
            <th >ราคา</th>
            <th >รวม</th>
        </tr>
    </thead>
    <tbody>
         @foreach($order_reviews as $key => $item)
        <tr>
            <td align="center" width="5%"> {{$key+1}}</td>
            <td >{{$item->ORDER_DETAIL_DRUG_CODE}}</td>
            <td>{{$item->ORDER_DETAIL_DRUG_NAME}}</td>
            <td width="10%">{{$item->ORDER_DETAIL_DRUG_QTY}}</td>
            <td width="15%">{{$item->UNIT_NAME}}</td>
            <td width="15%">{{$item->ORDER_DETAIL_DRUG_PRICE}}</td>
            <td width="15%">{{$item->ORDER_DETAIL_DRUG_TOTAL}}</td>
        </tr>

        @endforeach

    </tbody>
    <tr>
        <td></td><td></td><td></td><td></td><td></td>
        <td align="center" style="color: orangered;font-size:25px;"><b>Total</b></td>
        <td align="center" style="color: rgb(121, 16, 250);font-size:25px;"><b>{{$sum_order_review}}</b></td>
    </tr>
</table>
