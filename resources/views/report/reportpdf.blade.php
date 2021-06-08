<html>
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
  function formateDatetime($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $H= date("H",strtotime($strDate));
    $I= date("i",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];

  return  "$strDay $strMonthThai $strYear $H:$I";
    }  
  function formatetime($strtime)
{
  $H = substr($strtime,0,5);
  return $H;
  }
  date_default_timezone_set("Asia/Bangkok");
  $date = date('Y-m-d');  
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>      
        body {
            /* font-family: "THSarabunNew"; */
        }
        table {
        border-collapse: collapse;
        }
        table, th, td {
        border: 1px solid black;
        } 
    </style>
</head>

<body>
<br>
<div class="container-fluid"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><b>รายงานการรักษา</b></label>
<br>
<br>
            <table class="table table-hover" id="dataTable" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;color:#7B0099" width="7%">ลำดับ</th>                          
                            <th style="text-align: center;color:#7B0099" width="13%">วันที่</th>  
                            <th style="text-align: center;color:#7B0099" width="10%">เวลา</th>                           
                            <th style="text-align: center;color:#7B0099">ชื่อ-นามสกุล</th>  
                            <th style="text-align: center;color:#7B0099" width="8%">แพ้ยา</th> 
                            <th style="text-align: center;color:#7B0099">โรคประจำตัว</th>  
                            <th style="text-align: center;color:#7B0099">อาการ</th> 
                            <th style="text-align: center;color:#7B0099" width="8%">Diag</th> 
                            <th style="text-align: center;color:#7B0099" width="10%">ยอดรวม</th> 
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                  @foreach($datas as $sym)
                  <?php $number++;  ?>
                        <tr>
                          <td style="text-align: center;">{{ $number}}</td>
                           <td style="text-align: center;">{{DateThai($sym-> SYM_DATE)}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_TIME}}</td>
                           <td style="text-align: center;">{{$sym-> PER_FNAME}}&nbsp;&nbsp;  {{$sym-> PER_FNAME}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_DRUG_ALLERGY}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_ROKE}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_AKAN}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_DIAG}}</td>
                           <td style="text-align: center;">{{$sym-> SYM_SUMTOTALPRICE}}</td>
                        </tr>                       
                  @endforeach       
                    </tbody>
                </table>     
            </div>
        </div>
        <div class="card-footer shadow lg">
        
        </div>
    </div>
</div> 
</div>


</body>
</html>