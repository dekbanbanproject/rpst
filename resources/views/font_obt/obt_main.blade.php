@extends('layouts.font_obt')
@section('content')

<div class="container mt-0" >
<!--================= Food Slide section start =================-->
<section class="section">
            <div class="card pull-up">
                <div class="card-header">                           
                </div>
                <div class="card-content">
                    <div class="card-body py-0">
                        <div class="d-flex justify-content-between lh-condensed">
                            <div class="order-details text-center">
                                <div class="product-img d-flex align-items-center">
                                    @foreach ($imgpresents as $pic)
                                    <img class="mySlides" src="data:image/png;base64,{{ chunk_split(base64_encode($pic->img)) }}" alt="Card image cap" style="width:100%;height: 350px;">   
                                @endforeach 
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                    <span class="float-left">
                        <span class="text-muted">Ordered On</span>
                        <strong>Wed, Oct 3rd 2018</strong>
                    </span>
                    <span class="float-right">
                        <span class="text-muted">Ordered Amount</span>
                        <strong>$700</strong>
                    </span>
                </div>
         
       
{{-- </section> --}}
<!--================= Food Slide section end =================-->
 <!--================ Food menu section start =================-->
 {{-- <section class="section  mt-0" > --}}
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
        {{-- <img src="/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
        {{-- Bootstrap --}}
        </a>
    </nav>
    <div class="container" style="width: 100%;">   
            <div class="row">
                <div class="col-lg-3  p-0">              
                      <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-3 border-right-blue border-right-3 border-bottom-3 box-shadow-3">
                          <div class="card-head bg-info shadow-lg">
                              <div class="media p-1">
                                  <div class="media-body text-center">
                                    <a href="{{url('/')}}"><h2 class="media-heading" style="color:white"> หน้าแรก </h2></a>
                                  </div>
                              </div>
                          </div>                           
                          <div class="card-body border-top-blue-grey border-top-lighten-5 shadow-lg">
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
                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-3 border-right-blue border-right-3 border-bottom-3 box-shadow-3">
                        <div class="card-head bg-danger shadow-lg">
                            <div class="media p-1">
                                {{-- <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('/img/users/head.png') }}" alt="avatar"><i></i></span></div> --}}
                                <div class="media-body text-center">
                                    <h5 class="media-heading" style="color:white">{{$group->group_name}}</h5>
                                </div>
                            </div>
                        </div> 
                        <div class="card-body border-top-blue-grey border-top-lighten-5 shadow-lg">
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



            <div class="col-lg-6  ">                
                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3">
                    <div class="card-header shadow-lg">
                        ข่าวเด่น
                    </div>
                    <div class="card-body shadow lg">
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
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        <a href="#" class="btn btn-sm btn-outline-primary btn-min-width pull-right btn-glow mr-1 mb-1">รายละเอียด</a>
                    </div>                       
                </div>

                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title">Justified Tab with pills</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body shadow-lg">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" id="activeLable1-tab1" data-toggle="tab" href="#activeLable1" aria-controls="activeLable1" aria-expanded="true"><span class="badge badge-pill badge-glow badge-danger float-right">2</span> ข่าวจัดซื้อจัดจ้าง</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkLable1-tab1" data-toggle="tab" href="#linkLable1" aria-controls="linkLable1" aria-expanded="false"><span class="badge badge-pill badge-glow badge-info float-right">1</span> รายงานการดำเนินงาน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkOptLable1-tab1" data-toggle="tab" href="#linkOptLable1" aria-controls="linkOptLable1"><span class="badge badge-pill badge-glow badge-primary float-right">5</span> การจัดซื้อจัดจ้างหรือการจัดหาพัสดุ </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkOptLable2-tab1" data-toggle="tab" href="#linkOptLable2" aria-controls="linkOptLable2"><span class="badge badge-pill badge-glow badge-warning float-right">5</span> ประกาศราคากลาง </a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="activeLable1" aria-labelledby="activeLable1-tab1" aria-expanded="true">
                                    <p>Macaroon candy canes tootsie roll wafer lemon drops liquorice jelly-o tootsie roll cake. Marzipan
                                        liquorice soufflé cotton candy jelly cake jelly-o sugar plum marshmallow. Dessert cotton candy
                                        macaroon chocolate sugar plum cake donut.</p>
                                </div>
                                <div class="tab-pane" id="linkLable1" role="tabpanel" aria-labelledby="linkLable1-tab1" aria-expanded="false">
                                    <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie.
                                        Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit
                                        tiramisu.</p>
                                </div>
                                <div class="tab-pane" id="linkOptLable1" role="tabpanel" aria-labelledby="linkOptLable1-tab1" aria-expanded="false">
                                    <p>Cookie icing tootsie roll cupcake jelly-o sesame snaps. Gummies cookie dragée cake jelly marzipan
                                        donut pie macaroon. Gingerbread powder chocolate cake icing. Cheesecake gummi bears ice cream
                                        marzipan.</p>
                                </div>
                                <div class="tab-pane" id="linkOptLable2" role="tabpanel" aria-labelledby="linkOptLable2-tab" aria-expanded="false">
                                    <p>Soufflé cake gingerbread apple pie sweet roll pudding. Sweet roll dragée topping cotton candy cake
                                        jelly beans. Pie lemon drops sweet pastry candy canes chocolate cake bear claw cotton candy wafer.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title">Justified Tab with pills</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body shadow-lg">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" id="activeLable3-tab2" data-toggle="tab" href="#activeLable3" aria-controls="activeLable3" aria-expanded="true"><span class="badge badge-pill badge-glow badge-danger float-right">2</span> ข่าวจัดซื้อจัดจ้าง</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkLable2-tab2" data-toggle="tab" href="#linkLable2" aria-controls="linkLable2" aria-expanded="false"><span class="badge badge-pill badge-glow badge-info float-right">1</span> รายงานการดำเนินงาน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkOptLable5-tab2" data-toggle="tab" href="#linkOptLable5" aria-controls="linkOptLable5"><span class="badge badge-pill badge-glow badge-primary float-right">5</span> การจัดซื้อจัดจ้างหรือการจัดหาพัสดุ </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="linkOptLable3-tab2" data-toggle="tab" href="#linkOptLable3" aria-controls="linkOptLable3"><span class="badge badge-pill badge-glow badge-warning float-right">5</span> ประกาศราคากลาง </a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="activeLable3" aria-labelledby="activeLable3-tab1" aria-expanded="true">
                                    <p>Macaroon candy canes tootsie roll wafer lemon drops liquorice jelly-o tootsie roll cake. Marzipan
                                        liquorice soufflé cotton candy jelly cake jelly-o sugar plum marshmallow. Dessert cotton candy
                                        macaroon chocolate sugar plum cake donut.</p>
                                </div>
                                <div class="tab-pane" id="linkLable2" role="tabpanel" aria-labelledby="linkLable2-tab1" aria-expanded="false">
                                    <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie.
                                        Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit
                                        tiramisu.</p>
                                </div>
                                <div class="tab-pane" id="linkOptLable5" role="tabpanel" aria-labelledby="linkOptLable5-tab1" aria-expanded="false">
                                    <p>Cookie icing tootsie roll cupcake jelly-o sesame snaps. Gummies cookie dragée cake jelly marzipan
                                        donut pie macaroon. Gingerbread powder chocolate cake icing. Cheesecake gummi bears ice cream
                                        marzipan.</p>
                                </div>
                                <div class="tab-pane" id="linkOptLable3" role="tabpanel" aria-labelledby="linkOptLable3-tab" aria-expanded="false">
                                    <p>Soufflé cake gingerbread apple pie sweet roll pudding. Sweet roll dragée topping cotton candy cake
                                        jelly beans. Pie lemon drops sweet pastry candy canes chocolate cake bear claw cotton candy wafer.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title">Tabs with Right Border</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body shadow lg">                           
                            <div class="nav-vertical">
                                <ul class="nav nav-tabs nav-right nav-border-right">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="baseVerticalRight1-tab1" data-toggle="tab" aria-controls="tabVerticalRight11" href="#tabVerticalRight11" aria-expanded="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalRight1-tab2" data-toggle="tab" aria-controls="tabVerticalRight12" href="#tabVerticalRight12" aria-expanded="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="baseVerticalRight1-tab3" data-toggle="tab" aria-controls="tabVerticalRight13" href="#tabVerticalRight13" aria-expanded="false">About</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1">
                                    <div role="tabpanel" class="tab-pane active" id="tabVerticalRight11" aria-expanded="true" aria-labelledby="baseVerticalRight1-tab1">
                                        <p>Oat cake marzipan cake lollipop caramels wafer pie jelly beans. Icing halvah chocolate cake carrot
                                            cake. Jelly beans carrot cake marshmallow gingerbread chocolate cake. Gummies cupcake croissant.</p>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalRight12" aria-labelledby="baseVerticalRight1-tab2">
                                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie pastry cotton candy oat cake fruitcake
                                            jelly chupa chups. Pudding caramels pastry powder cake soufflé wafer caramels. Jelly-o pie cupcake.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="tabVerticalRight13" aria-labelledby="baseVerticalRight1-tab3">
                                        <p>Biscuit ice cream halvah candy canes bear claw ice cream cake chocolate bar donut. Toffee cotton
                                            candy liquorice. Oat cake lemon drops gingerbread dessert caramels. Sweet dessert jujubes powder
                                            sweet sesame snaps.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            

                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3">
                    <div class="card-header shadow-lg">
                        Featured
                    </div>
                    <div class="card-body shadow lg">
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
                        <a href="#" class="btn btn-sm btn-outline-primary btn-min-width pull-right btn-glow mr-1 mb-1">รายละเอียด</a>
                    </div>                       
                </div> 
            </div> 

            <div class="col-lg-3 p-0">                    
                <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-3 border-right-blue border-right-3 border-bottom-3 box-shadow-3">
                      <div class="card-header shadow-lg">
                          <h4 class="card-title">Carousel</h4>
                      </div>
                      <div class="card-content shadow-lg">                   
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
                          <div class="card-body shadow-lg">
                              <p class="card-text">Some quick</p>
                              <a href="#" class="card-link">Card link</a>
                              <a href="#" class="card-link">Another link</a>
                          </div>
                      </div>              
                    </div>

                    <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-3 border-right-blue border-right-3 border-bottom-3 box-shadow-3">
                        <div class="card-head">
                            <div class="media">
                                <a><img src="{{ asset('/img/obt/tel.jpg') }}" width="270px" height="100px"alt="..."></a>                              
                            </div>                             
                        </div>                       
                        <div class="card-content collapse show">
                            <div class="card-body shadow-lg">
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

                    <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-3 border-right-blue border-right-3 border-bottom-3 box-shadow-3">
                      <div class="card-header shadow-lg">
                          <h4 class="card-title">ทำเนียบบุคลากร</h4>
                          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                          <div class="heading-elements">                              
                          </div>
                      </div>
                      <div class="card-content collapse show">
                          <div class="card-body shadow-lg">
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
   

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://www.dekbanbanproject.com" target="_blank">dekbanbanproject.com</a></span><span class="float-md-right d-none d-lg-block">Dekbanbanproject & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
</footer>
<!-- END: Footer-->
</div>
</section>
<!--================Food menu section end =================-->



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
<script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>

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
