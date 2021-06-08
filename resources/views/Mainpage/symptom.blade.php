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

<br>
<br>
<center>    
    <div class="block" style="width: 90%;">
<!--================Featured Section Start =================-->
  <!-- <section class="section-margin mb-lg-100"> -->
    <!-- <div class="container-fluid"> -->
      <div class="section-intro mb-75px">
        <h4 class="intro-title">รายชื่อคนไข้ที่มารักษา</h4>
        <h2>Medical Service</h2>
      </div>

  
    <form action="{{route('Per.report_searchfont')}}" method="post">
    @csrf
      <div class="row">
            <div class="col-md-1 text-right">
                 
            </div>          
            <div class="col-md-0.5"> วันที่</div>
            <div class="col-md-2">             
                <input type="date"  name = "DATE_BIGIN"  id="DATE_BIGIN"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >                    
            </div>
            <div class="col-md-0.5"> ถึง  </div>
            <div class="col-md-2">    
                <input type="date"  name = "DATE_END"  id="DATE_END"  class="form-control input-lg " data-date-format="mm/dd/yyyy"  >            
            </div> 
            <div class="col-sm-3"> 
            <input name = "search"  id="search"  class="form-control input-lg "  value="{{$search}}">            
            </div>
            <div class="col-sm-1 text-left">
                <span>
                    <button type="submit" class="btn btn-sm btn-info" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;">ค้นหา</button>
                </span> 
            </div>  
          
            <div class="col-lg-1">  
                
            </div>
        </form>
            <div class="col">
           
        </div>
    </div> 

    <br>

        <div class="card-body shadow lg">
            <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" >
                    <thead>
                        <tr>
                            <th style="text-align: center;"width="3%">ลำดับ</th>  
                            <th style="text-align: center;"width="13%">วันที่</th>                          
                            <th style="text-align: center;" >ชื่อ-นามสกุล</th> 
                            <th style="text-align: center;" width="12%">เบอร์โทร</th>  
                            <th style="text-align: center;" width="10%">อายุ</th>  
                            <th style="text-align: center;" width="15%">Total</th>              
                            <th style="text-align: center;"width="10%">รายละเอียด</th>                            
                        </tr>
                    </thead>              
                    <tbody>
                    <?php $number = 0; ?>
                        @foreach ($syms as $sym)
                            <?php $number++;  ?>
                        <tr>                            
                            <td style="text-align: center;">{{ $number}}</td>                                                               
                            <td style="text-align: center;">{{DateThai($sym->SYM_DATE) }}</td> 
                            <td style="text-align: center;">{{ $sym->PER_FNAME}}&nbsp;&nbsp; {{ $sym->PER_LNAME}}</td>
                            <td style="text-align: center;">{{ $sym->PER_TEL}}</td> 
                            <td style="text-align: center;">{{ $sym->PER_AGE}}</td> 
                            <td style="text-align: center;">{{ $sym->SYM_SUMTOTALPRICE}}</td> 
                            <td style="text-align: center;">
                             
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#EditModal{{$sym->PER_ID}}"><i class="fas fa-qrcode"></i></button>
                            </td>                           
                        </tr> 

 <!-- view/.largeModal-->
 <div class="modal fade" id="EditModal{{$sym->PER_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">           
                        <div class="modal-header">                
                            <h4 style="color:#7CBB00">ประวัติคุณ&nbsp;&nbsp;{{ $sym->PER_FNAME}}&nbsp;{{ $sym->PER_LNAME}}</h4>
                        </div>
                        <div class="modal-body"> 
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>วันที่ :</b></label> &nbsp; {{ DateThai($sym->SYM_DATE)}}
                                    </div>
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>เวลา:</b></label> {{ $sym->SYM_TIME}}
                                    </div>                                   
                                </div>   
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>แพ้ยา :</b></label>  &nbsp; {{ $sym->SYM_DRUG_ALLERGY}}
                                    </div>
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>โรคประจำตัว:</b></label> &nbsp; {{ $sym->SYM_ROKE}}
                                    </div>
                                                                     
                                </div>   
                                <div class="form-row">
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>อาการ :</b></label>  &nbsp;{{ $sym->SYM_AKAN}}
                                    </div> 
                                    <div class="col-md-6 mb-6 text-left"> 
                                        <label for="" style="color:#7B0099"><b>Diag :</b></label> &nbsp; {{ $sym->SYM_DIAG}}
                                    </div>                          
                                </div>   

                            
                        </div> 
                        <div class="modal-footer">                
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div> 
                </div> 
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
  <!-- </section> -->
  </div>

  </center>

  <br>
  <center>    
    <div class="block" style="width: 90%;">
    <div class="row">
    <div class="col-md-6">
          <!-- PIE CHART -->
          <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">Chart รายการเบิกยา</h3>
              <?php $data_drugs[] = array('รายการยา','รายการยา'); ?>
                @foreach ($drugpiechart as $drug_piechart)
                    <?php $data_drugs[] = array($drug_piechart->PAYDETAIL_DRUG_NAME,$drug_piechart->drugs_count); ?>   
                        @endforeach
             
              </div>
              <div class="card-body">
              <div id="piechart_drugs" style="width: 100%; height: 400px;"></div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
    <div class="col-md-6">
          <!-- PIE CHART -->
          <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Chart Supplies</h3>
                    <?php $data_suprec[] = array('รายการ Supplies','Supplies'); ?>
                        @foreach ($sup_piecharts as $sup_piechart)
                    <?php $data_suprec[] = array($sup_piechart->SUP_NAME,$sup_piechart->sup_count); ?>   
                        @endforeach
                
                </div>
                <div class="card-body">
                    <div id="piechart_suprec" style="width: 100%; height: 400px;"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
   
    </center>
    <br>
  <center>    
    <div class="block" style="width: 90%;">
    <div class="row">
    <div class="col-md-6">
          <!-- PIE CHART -->
          <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">Chart หมวดหมู่รายการยา</h3>
              <?php $data_cat[] = array('สถานที่เกิดเหตุ','จำนวนที่เกิดเหตุ'); ?>
                        @foreach ($catpiechart as $cat_piechart)
                            <?php $data_cat[] = array($cat_piechart->CAT_NAME,$cat_piechart->cat_count); ?>   
                                @endforeach
             
              </div>
              <div class="card-body">
              <div id="piechart_drugcat" style="width: 100%; height: 400px;"></div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
    <div class="col-md-6">
          <!-- PIE CHART -->
          <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Chart รายการยา</h3>
                    <?php $data_drugname[] = array('รายการยา','จำนวนยา'); ?>
                        @foreach ($chart_drugs as $chart_drug)
                            <?php $data_drugname[] = array($chart_drug->DRUG_NAME,$chart_drug->drug_count); ?>   
                                @endforeach
                
                </div>
                <div class="card-body">
                    <div id="piechart_3d" style="width: 100%; height: 400px;"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
   
    </center>
 
<script src="{{ asset('google/Charts.js') }}"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_drugname);
            ?>);

        var options = {
          title: 'รายการยา',
          pieHole: 0.4,
        //   is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_suprec);
            ?>);

      var options = {
          title: 'รายการ Supplies',
          fontName: 'Kanit', 
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_suprec'));
        chart.draw(data, options);
        }
    
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_drugs);
            ?>);

      var options = {
          title: 'รายการยาที่เบิกจ่าย',
          fontName: 'Kanit', 
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_drugs'));
        chart.draw(data, options);
        }
    
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var data = google.visualization.arrayToDataTable( <?php
            echo json_encode($data_cat);
            ?>);

      var options = {
          title: 'หมวดหมู่รายการยา',
          fontName: 'Kanit', 
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_drugcat'));
        chart.draw(data, options);
        }
    
</script>
