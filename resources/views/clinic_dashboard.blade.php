@extends('layouts.clinic_dashboard')
<script src="//www.amcharts.com/lib/4/core.js"></script>
<script src="//www.amcharts.com/lib/4/charts.js"></script>
<script src="//www.amcharts.com/lib/4/themes/animated.js"></script>


@section('content')
<style>
.redarchartdiv {
  width: 100%;
  height: 400px;
}
</style>
<br>
<center>    
    <div class="block" style="width: 80%;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>          
        </div>                   
    
    <div class="block-content">       
            <div class="row">
                <!-- Stats -->
                <div class="outer-w3-agile col-xl">
                    <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
                        <div class="s-l">
                            <h5>ผู้ป่วยอายุ 1-12 ปี</h5>
                            <p class="paragraph-agileits-w3layouts text-white">จำนวนคนที่มารักษา</p>
                        </div>
                        <div class="s-r">
                            <h6>
                            {{$amount_1}} คน
                                <!-- <i class="far fa-edit"></i> -->
                                <i class="fas fa-users"></i>
                            </h6>
                        </div>
                    </div>
                    <div class="stat-grid p-3 mt-2 d-flex align-items-center justify-content-between bg-success">
                        <div class="s-l">
                            <h5>ผู้ป่วยอายุ 13-25 ปี</h5>
                            <p class="paragraph-agileits-w3layouts text-white">จำนวนคนที่มารักษา</p>
                        </div>
                        <div class="s-r">
                            <h6>
                            {{$amount_2}} คน
                                <!-- <i class="far fa-smile"></i> -->
                                <i class="fas fa-users"></i>
                            </h6>
                        </div>
                    </div>
                    <div class="stat-grid p-3 mt-2 d-flex align-items-center justify-content-between bg-danger">
                        <div class="s-l">
                            <h5>ผู้ป่วยอายุ 26-35 ปี</h5>
                            <p class="paragraph-agileits-w3layouts text-white">จำนวนคนที่มารักษา</p>
                        </div>
                        <div class="s-r">
                            <h6>
                            {{$amount_3}} คน
                                <i class="fas fa-users"></i>
                                <!-- <i class="fas fa-tasks"></i> -->
                            </h6>
                        </div>
                    </div>
                    <div class="stat-grid p-3 mt-2 d-flex align-items-center justify-content-between bg-warning">
                        <div class="s-l">
                            <h5>ผู้ป่วยอายุ 36 ปีขึ้นไป</h5>
                            <p class="paragraph-agileits-w3layouts text-white">จำนวนคนที่มารักษา</p>
                        </div>
                        <div class="s-r">
                            <h6>
                            {{$amount_4}} คน
                                <i class="fas fa-users"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <!--// Stats -->


                <!-- Pie-chart -->
                <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                    <!-- <h4 class="tittle-w3-agileits mb-4">Chart %</h4> -->
                    <div id="chartdiv"></div>
                </div>
                <!--// Pie-chart -->
                </div> 
                </div>
               
           <br>

        <div class="row">
            <div class="outer-w3-agile col-xl">
                <h4 class="tittle-w3-agileits mb-4">Chart %</h4>
                <div id="redarchartdiv"></div>
            </div>
            <!-- Pie-chart -->
            <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                <!-- <h4 class="tittle-w3-agileits mb-4">Chart %</h4> -->
                <div id="rchartdiv"></div>
            </div>
        <!--// Pie-chart -->
          
        </div>  
        </div>  
    </div>   

    
<br>     
<br>  
</center>  
<center>     
    <div class="block shadow lg mb-4" style="width: 80%;">
        <div class="row">
            <div id="columnchart_car" style="font-family: 'Kanit', sans-serif;width: 100%; height: 500px;"></div>
        </div>      
    </div>

</center>  
   


<script src="{{ asset('google/Charts.js') }}"></script>
<script src="{{ asset('js_dashboard/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('js_dashboard/modernizr.js') }}"></script>
<!-- Bar-chart -->
<script src="{{ asset('js_dashboard/rumcaJS.js') }}"></script>
<script src="{{ asset('js_dashboard/example.js') }}"></script>
<!--// Bar-chart -->
<!-- Radar-chart -->
<script src="{{ asset('js_dashboard/radarchart_ex.js') }}"></script>

<script>
/* Create chart instance */
var chart = am4core.create("rchartdiv", am4charts.RadarChart);

/* Add data */
chart.data = [{
  "mount": "ม.ค",
  "litres": <?php echo $m1_1; ?>,
  "units": 250
}, {
  "mount": "ก.พ",
  "litres": 301,
  "units": 222
}, {
  "mount": "มี.ค",
  "litres": 266,
  "units": 179
}, {
  "mount": "เม.ย",
  "litres": 165,
  "units": 298
}, {
  "mount": "พ.ค",
  "litres": 139,
  "units": 299
}, {
  "mount": "มิ.ย",
  "litres": 336,
  "units": 185
}, {
  "mount": "ก.ค",
  "litres": 290,
  "units": 150
}, {
  "mount": "ส.ค",
  "litres": 325,
  "units": 382
}, {
  "mount": "ส.ค",
  "litres": 325,
  "units": 382
}, {
  "mount": "ก.ย",
  "litres": 40,
  "units": 172
}, {
  "mount": "ส.ค",
  "litres": 325,
  "units": 382
}, {
  "mount": "ส.ค",
  "litres": 325,
  "units": 382
}, {
  "mount": "ส.ค",
  "litres": 325,
  "units": 382

}];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "mount";

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create and configure series */
var series = chart.series.push(new am4charts.RadarSeries());
series.dataFields.valueY = "litres";
series.dataFields.categoryX = "mount";
series.name = "Sales";
series.strokeWidth = 3;
series.zIndex = 2;

var series2 = chart.series.push(new am4charts.RadarColumnSeries());
series2.dataFields.valueY = "units";
series2.dataFields.categoryX = "mount";
series2.name = "Units";
series2.strokeWidth = 0;
series2.columns.template.fill = am4core.color("#CDA2AB");
series2.columns.template.tooltipText = "Series: {name}\nCategory: {categoryX}\nValue: {valueY}";
</script>

</script>


<!-- pie-chart -->
<script src="{{ asset('js_dashboard/amcharts.js') }}"></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                PER_AGE: "ผู้ป่วยอายุ 1-12 ปี",
                value: <?php echo $amount_1; ?>
            },
            {
                PER_AGE: "ผู้ป่วยอายุ 13-25 ปี",
                value: <?php echo $amount_2; ?>
            },
            {
                PER_AGE: "ผู้ป่วยอายุ 26-35 ปี",
                value: <?php echo $amount_3; ?>
            },
            {
                PER_AGE: "ผู้ป่วยอายุ 36 ปีขึ้นไป",
                value: <?php echo $amount_4; ?>
            },
           
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "PER_AGE";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;

            // WRITE
            chart.write("chartdiv");
        });
</script>
<!-- /pie-chart -->
<script>
    $(window).load(function () {           
        $(".se-pre-con").fadeOut("slow");;
    });
</script>
    
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['เดือน','จำนวน (คน)'],
            ['ม.ค', <?php echo $m1_1; ?>],
            ['ก.พ', <?php echo $m2_1; ?>],
            ['มี.ค', <?php echo $m3_1;?>],
            ['เม.ย', <?php echo $m4_1;?>],
            ['พ.ค', <?php echo $m5_1;?>],
            ['มิ.ย', <?php echo $m6_1;?>],
            ['ก.ค', <?php echo $m7_1;?>],
            ['ส.ค', <?php echo $m8_1;?>],
            ['ก.ย', <?php echo $m9_1;?>],
            ['ต.ค', <?php echo $m10_1;?>],
            ['พ.ย', <?php echo $m11_1; ?>],
            ['ธ.ค', <?php echo  $m12_1;?>]
        ]);
        var options = {
            fontName: 'Kanit',
            hAxis: { slantedText: true, 
                      slantedTextAngle: 45
            },
          chart: {
            title: 'รายงานการรักษา',
          }        
        };     
        var chart = new google.charts.Bar(document.getElementById('columnchart_car'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>

@endsection