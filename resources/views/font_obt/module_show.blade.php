@extends('layouts.font_obt')
@section('content')

<style>
    .modal-footer {
        background-color: #f9f9f9;
    }
    .container-fluid-boxs{
    }
    .card-p{
        margin-left: 200px;
        margin-right: 200px;
    }
    .card-p-1{
        margin-left: 100px;
        margin-right: 30px;
    }
    .content-header-1{
        margin-left: 200px;
        margin-right: 200px;
    }

</style>

 <!--================Food menu section start =================-->
<br><br>
 <section class="section">
    <div class="container" style="width: 80%;">  
        <div class="row">           
            <div class="col-lg-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/img/obt/S1.jpg') }}" width="1200px" height="350px"alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/obt/s2.jpg') }}" width="1200px" height="350px"alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/obt/S1.jpg') }}" class="d-block w-100" width="1200px" height="350px"alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>                
            </div> 
        </div>               
    </div>
</section>
<!--================= Food menu section end =================-->

 <!--================ Food menu section start =================-->
 <section class="section ">
    <div class="container" style="width: 90%;">     
            <div class="row">
                <div class="col-lg-3 mt-1 p-0">              
                      <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-3">
                          <div class="card-head bg-info">
                              <div class="media p-1">
                                  {{-- <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('/img/users/head.png') }}" alt="avatar"><i></i></span></div> --}}
                                  <div class="media-body text-center">
                                    <a href="{{url('/')}}"><h2 class="media-heading" style="color:white"> หน้าแรก </h2></a>
                                  </div>
                              </div>
                          </div>                           
                          <div class="card-body border-top-blue-grey border-top-lighten-5">
                              <div class="list-group">                                 
                                    <div class="list-group list-group-messages">
                                        @foreach ($mainpages as $key => $u)
                                        <a href="{{url('module_show/'.$u->module_id)}}" class="list-group-item list-group-item-action" id="inbox-menu">
                                            <div class="d-inline mr-100"><i class="ft-plus-circle mr-1 text-success"></i></div>{{$u->module_name}}
                                        </a>
                                        @endforeach  
                                  </div>                                  
                              </div>
                          </div>                           
                      </div> 
                      
                      @foreach ($pagegroups as $key => $group)   
                    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-3">
                        <div class="card-head bg-danger">
                            <div class="media p-1">
                                {{-- <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('/img/users/head.png') }}" alt="avatar"><i></i></span></div> --}}
                                <div class="media-body text-center">
                                    <h5 class="media-heading" style="color:white">{{$group->group_name}}</h5>
                                </div>
                            </div>
                        </div> 
                        <div class="card-body border-top-blue-grey border-top-lighten-5">
                        <?php 
                            $group_show  = DB::table('pageleftmodules')
                            ->where('module_id','<>','1')
                            ->where('status','=','true')
                            // ->where('ELECTRICAL_SUB_CHECK_ID','<>','12')
                            ->where('group_id','=',$group->group_id)->get();
                        ?>
                            <div class="list-group">                                 
                                <div class="list-group list-group-messages">
                                    @foreach ($group_show as $key => $msub)
                                    <a href="{{url('module_show/'.$msub->module_id)}}" class="list-group-item list-group-item-action" id="inbox-menu">
                                        <div class="d-inline mr-100"><i class="ft-plus-circle mr-1 text-success"></i></div>{{$msub->module_name}}
                                    </a>
                                @endforeach
                                </div>                              
                            </div>

                        </div>                           
                    </div>  
                @endforeach 
                  
                  

                </div> 


                <div class="col-lg-9 mt-1 ">
                
                        <div class="card border-top-warning border-top-3 border-bottom-warning border-bottom-3 box-shadow-3 ">
                            <div class="card-header bg-success">
                                    <a href="{{url('/')}}" class="btn btn-sm btn-info box-shadow-2 pull-right mr-1" style="color:rgb(253, 251, 251)">ย้อนกลับ <i class="ft-chevrons-left ml-1" style="color:rgb(253, 251, 251)"></i></a>
                                    <label for=""  style="font-size:20px;color:rgb(255, 255, 255)"><b>{{$mainpageshows->module_name}}<b></label>                                                                                           
                            </div>
                            <div class="card-body">
                              {{-- <h5 class="card-title">{{$mainpageshows->module_name}}</h5> --}}
                              <p class="card-text">
                                {!!$mainpageshows->module_detail!!}
                              </p>
                              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>                       
                        </div>
                   
                
                </div> 
              
            </div> 
        </div>
    </div>
</section>
<!--================Food menu section end =================-->





<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://gotowinsolution.co.th" target="_blank">Scan-gtw</a></span><span class="float-md-right d-none d-lg-block">Gotowin Solution & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
</footer>
<!-- END: Footer-->


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
<script src="{{ asset('google/Charts.js') }}"></script>
<script src="{{ asset('webcamjs/webcam.min.js') }}"></script>
@endsection
