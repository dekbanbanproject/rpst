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

<div class="container mt-0" >

 <section class="section">
        <div class="row">           
            <div class="col-lg-12">
                <div style="max-width:100%;">
                    @foreach ($imgpresents as $pic)
                      <img class="mySlides" src="data:image/png;base64,{{ chunk_split(base64_encode($pic->img)) }}" style="width:100%;height: 350px;">
                     
                    @endforeach  
                     
                    </div>
               
            </div> 
        </div>   
</section>
<!--================= Food menu section end =================-->

 <!--================ Food menu section start =================-->
 <section class="section " >
    <div class="container" style="width: 100%;">     
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
                            // ->leftjoin('')
                            ->where('module_id','<>','1')
                            ->where('status','=','true')
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

                <div class="col-lg-6 mt-1 ">
                
                        <div class="card ">
                            <div class="card-header">
                              Featured
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.

                              </p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>                       
                        </div>

                        <div class="card text-center">
                            <div class="card-header">
                              Featured
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.

                              </p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>                       
                        </div>

                        <div class="card text-center">
                            <div class="card-header">
                              Featured
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.

                              </p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>                       
                        </div>
                
                </div> 



                <div class="col-lg-3 mt-1 p-0">                    
                    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-3">
                      <div class="card-header">
                          <h4 class="card-title">Carousel</h4>
                      </div>
                      <div class="card-content">                   
                          <div id="carousel-example" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                  <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                  <li data-target="#carousel-example" data-slide-to="1"></li>
                                  <li data-target="#carousel-example" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner" role="listbox">
                                  <div class="carousel-item active">
                                      <img src="{{ asset('/img/users/head.png') }}" class="d-block w-100" alt="First slide" height="250px" width="20px" >
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('/img/users/head.png') }}" class="d-block w-100" alt="Second slide" height="250px" width="20px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('/img/users/head.png') }}" class="d-block w-100" alt="Third slide" height="250px" width="20px">
                                  </div>
                              </div>
                              <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev" height="250px" width="20px">
                                  <span class="la la-angle-left" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next" >
                                  <span class="la la-angle-right icon-next" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                              </a>
                          </div>
                          <div class="card-body">
                              <p class="card-text">Some quick</p>
                              <a href="#" class="card-link">Card link</a>
                              <a href="#" class="card-link">Another link</a>
                          </div>
                      </div>              
                    </div>

                    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-3">
                      
                        <div class="card-head">
                            <div class="media">
                                <a><img src="{{ asset('/img/obt/tel.jpg') }}" width="270px" height="100px"alt="..."></a>                              
                            </div>
                             
                        </div>  

                     
                      <div class="card-content collapse show">
                          <div class="card-body">
                            <a href="#" class="list-group-item list-group-item-action">
                              <div class="d-inline mr-25">
                                  <i class="ft-info"></i>
                              </div>
                              Spam
                              <span class="badge badge-warning badge-pill badge-round float-right">3</span>
                            </a>
                          </div>
                      </div>
                    </div>

                    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-3">
                      <div class="card-header">
                          <h4 class="card-title">Border Extra Large Size</h4>
                          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                          <div class="heading-elements">
                              <ul class="list-inline mb-0">
                                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="card-content collapse show">
                          <div class="card-body">
                            <a href="#" class="list-group-item list-group-item-action">
                              <div class="d-inline mr-25">
                                  <i class="ft-info"></i>
                              </div>
                              Spam
                              <span class="badge badge-warning badge-pill badge-round float-right">3</span>
                            </a>
                          </div>
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

</div>
 <!--================Picture Slide section start =================-->



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

<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 3000); // Change image every 2 seconds
    }
    </script>


@endsection
