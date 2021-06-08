@extends('layouts.dash_main')

@section('content')
 
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Hospital Info cards -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-user-md font-large-2 success"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 class="text-muted text-bold-500">Detail</h5>
                                        <h3 class="text-bold-600">245</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card pull-up">
                      <div class="card-content">
                          <div class="card-body">
                              <div class="media d-flex">
                                  <div class="align-self-center">
                                      <i class="la la-stethoscope font-large-2 warning"></i>
                                  </div>
                                  <div class="media-body text-right">
                                      <h5 class="text-muted text-bold-500">Detail</h5>
                                      <h3 class="text-bold-600">235</h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card pull-up">
                      <div class="card-content">
                          <div class="card-body">
                              <div class="media d-flex">
                                  <div class="align-self-center">
                                      <i class="la la-bed font-large-2 danger"></i>
                                  </div>
                                  <div class="media-body text-right">
                                      <h5 class="text-muted text-bold-500"> Detail</h5>
                                      <h3 class="text-bold-600">958</h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
               
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="la la-calendar-check-o font-large-2 info"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h5 class="text-muted text-bold-500">Detail</h5>
                                        <h3 class="text-bold-600">456</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Hospital Info cards Ends -->
  
            <!-- Appointment Bar Line Chart -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chart</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body ">
                                <canvas id="comboscan" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Appointment Bar Line Chart Ends -->
           
        </div>
    </div>
</div>
  <!-- END: Content-->
  @endsection
  @section('footer')
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/appointment.js') }}"></script>
 <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
 <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>

  <script>        
    $(window).on("load", function(){

        //Get the context of the Chart canvas element we want to select
        var ctx = $("#comboscan");

        // Chart Options
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Chart.js Combo Bar Line Chart'
            }
        };

        // Chart Data
        var chartData = {
            labels: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
            datasets: [{
                type: 'bar',
                label: "พศ.2523",
                data: [
                    <?php echo $opd123; ?>,
                    <?php echo $opd223; ?>,
                    <?php echo $opd323; ?>,
                    <?php echo $opd423; ?>,
                    <?php echo $opd523; ?>,
                    <?php echo $opd623; ?>,
                    <?php echo $opd723; ?>,
                    <?php echo $opd823; ?>,
                    <?php echo $opd923; ?>,
                    <?php echo $opd1023; ?>,
                    <?php echo $opd1123; ?>,
                    <?php echo $opd1223; ?>,
                ],
                backgroundColor: "rgb(88, 166, 249)",
                borderColor: "transparent",
                borderWidth: 2,
                pointBorderColor: "#FA8E75",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },{
                type: 'bar',
                label: "พศ.2521",
                data: [
                    <?php echo $opd1; ?>,
                    <?php echo $opd2; ?>,
                    <?php echo $opd3; ?>,
                    <?php echo $opd4; ?>,
                    <?php echo $opd5; ?>,
                    <?php echo $opd6; ?>,
                    <?php echo $opd7; ?>,
                    <?php echo $opd8; ?>,
                    <?php echo $opd9; ?>,
                    <?php echo $opd10; ?>,
                    <?php echo $opd11; ?>,
                    <?php echo $opd12; ?>,
                ],
                backgroundColor: "rgba(250,142,117,.5)",
                borderColor: "transparent",
                borderWidth: 2,
                pointBorderColor: "#FA8E75",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },{
                type: 'line',
                label: "พศ.2522",
                data: [
                    <?php echo $opd122; ?>,
                    <?php echo $opd222; ?>,
                    <?php echo $opd322; ?>,
                    <?php echo $opd422; ?>,
                    <?php echo $opd522; ?>,
                    <?php echo $opd622; ?>,
                    <?php echo $opd722; ?>,
                    <?php echo $opd822; ?>,
                    <?php echo $opd922; ?>,
                    <?php echo $opd1022; ?>,
                    <?php echo $opd1122; ?>,
                    <?php echo $opd1222; ?>,
                ],
                backgroundColor: "rgb(144,167,252)",
                borderColor: "transparent",
                borderWidth: 2,
                pointBorderColor: "##99ffcc",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },{
                type: 'bar',
                label: "พศ.2520",
                data: [
                    <?php echo $opd11; ?>,
                    <?php echo $opd21; ?>,
                    <?php echo $opd31; ?>,
                    <?php echo $opd41; ?>,
                    <?php echo $opd51; ?>,
                    <?php echo $opd61; ?>,
                    <?php echo $opd71; ?>,
                    <?php echo $opd81; ?>,
                    <?php echo $opd91; ?>,
                    <?php echo $opd101; ?>,
                    <?php echo $opd111; ?>,
                    <?php echo $opd121; ?>,
                ],
                backgroundColor: "#00A5A8",
                borderColor: "transparent",
                borderWidth: 2
            }, {
                type: 'bar',
                label: "พศ.2519",
                data: [
                    <?php echo $opd12; ?>,
                    <?php echo $opd22; ?>,
                    <?php echo $opd32; ?>,
                    <?php echo $opd42; ?>,
                    <?php echo $opd52; ?>,
                    <?php echo $opd62; ?>,
                    <?php echo $opd72; ?>,
                    <?php echo $opd82; ?>,
                    <?php echo $opd92; ?>,
                    <?php echo $opd102; ?>,
                    <?php echo $opd112; ?>,
                    <?php echo $opd122; ?>,
                ],
                backgroundColor: "#F25E75",
                borderColor: "transparent",
                borderWidth: 2
            }]
        };

        var config = {
            type: 'bar',

            // Chart Options
            options : chartOptions,

            data : chartData
        };

        // Create the chart
        var lineChart = new Chart(ctx, config);

        });
</script>
@endsection