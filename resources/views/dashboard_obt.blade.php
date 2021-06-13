@extends('layouts.dash_obt')

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
                                        <h5 class="text-muted text-bold-500">Detail Store</h5>
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
                                      <h5 class="text-muted text-bold-500">Detail Store</h5>
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
                                      <h5 class="text-muted text-bold-500"> Detail Store</h5>
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

  
@endsection