@extends('layouts.font_obt')
@section('content')

<?php   
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d');
    $time = now();
    use App\Http\Controllers\ConfigController;  
?>

<div class="container mt-0" >
<!--================= Food Slide section start =================-->
<section class="section">
            <div class="card pull-up">
                <div class="card-header">                           
                </div>
                <div class="card-content ">
                    <div class="card-body py-0 pull-up">
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
                        <strong><b><h5 style="font-size:18px;color:red">{{DateThai($date)}}</h5></b></strong>
                    </span>
                    <span class="float-right">
                        <strong><b><h5 id="displayTime" style="font-size:18px;color:red"></h5></b></strong>
                    </span>
                </div>
         

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">       
        </a>
    </nav>
    <div class="container" style="width: 100%;">   
          <div class="row">  
            <div class="col-lg-9  ">                
                <div class="card border-top-blue border-top-3 border-bottom-blue border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3 pull-up">
                    <div class="card-header text-center shadow-lg">
                         {{-- <label for="" style="font-size:19px;color:rgb(240, 15, 8)">{{$depfs->departs_name}}</label> --}}
                         <a class="btn btn-outline-danger btn-min-width btn-glow p-2 mb-1" data-dismiss="modal" style="font-size:19px;color:rgb(63, 37, 179)">{{$depfs->departs_name}}</a>
                    </div>
                    <div class="card-body shadow lg"> 
                        <form action="{{ route('obt.obt_main_contacts_save') }}" method="POST" enctype="multipart/form-data">
                            @csrf                             
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-3">                                     
                                    </div>
                                    <div class="col-md-6 " align="center">
                                        <fieldset class="form-group position-relative ">
                                            @foreach ($depheads as $dephead)

                                            @if ($dephead->POSIT_ID == 11)
                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($dephead->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 350px;"> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->name}}  {{$dephead->lname}}</label> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->POSIT_NAME}}</label> 
                                            @elseif($dephead->POSIT_ID == 12)
                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($dephead->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 350px;"> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->name}}  {{$dephead->lname}}</label> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->POSIT_NAME}}</label> 
                                            @elseif($dephead->POSIT_ID == 13)
                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($dephead->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 350px;"> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->name}}  {{$dephead->lname}}</label> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->POSIT_NAME}}</label> 
                                            @elseif($dephead->POSIT_ID == 14)
                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($dephead->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 350px;"> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->name}}  {{$dephead->lname}}</label> <br>
                                                <label for="" style="font-size:19px;color:rgb(63, 37, 179)">{{$dephead->POSIT_NAME}}</label>
                                            
                                            @else


                                            @endif
                                            
                                            @endforeach 
                                        </fieldset>
                                    </div>  
                                    <div class="col-md-3">                                     
                                    </div>                                 
                                </div>
                                <div class="row">
                                   
                                        <div class="col-md-6" align="center">
                                            @foreach ($depheads as $dephead)
                                           


                                           
                                            @endforeach   
                                        </div>  
                                        <div class="col-md-6" align="center">
                                        
                                        </div>  
                                                            
                                </div>
                               
                            </div>
                            <div class="card-footer" align="right">
                                                
                            </div>
                        </form> 
                           

                    </div>                       
                </div>
            </div>
            <div class="col-lg-3 p-0">                    
                <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3 pull-up">
                      <div class="card-header shadow-lg">
                          <h4 class="card-title text-center">ผู้บริหาร</h4>
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
                                      @foreach ($nayogs as $yog)
                                      <img src="data:image/png;base64,{{ chunk_split(base64_encode($yog->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 290px;">   
                                      @endforeach
                                  </div>
                                  <div class="carousel-item">
                                    @foreach ($nayogs as $yog)
                                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($yog->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 290px;">   
                                    @endforeach
                                  </div>
                                  <div class="carousel-item">
                                    @foreach ($nayogs as $yog)
                                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($yog->img)) }}" class="d-block w-100" alt="First slide" style="width:100%;height: 290px;">   
                                    @endforeach
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
                            @foreach ($nayogs as $na)
                              <p class="card-text text-center">{{$na->POSIT_NAME}}</p>                              
                              <p class="card-text text-center">{{$na->name}} {{$na->lname}}</p>
                              @endforeach
                          </div>
                      </div>              
                    </div>

                    <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3 pull-up">
                        <div class="card-head">
                            <div class="media">
                                <a><img src="{{ asset('/img/obt/tel.jpg') }}" width="270px" height="100px"alt="..."></a>                              
                            </div>                             
                        </div>                       
                        <div class="card-content collapse show">
                            <div class="card-body shadow-lg">
                                <a href="{{url('obt_main_contacts')}}" class="list-group-item list-group-item-action">
                                <div class="d-inline mr-25">
                                    <i class="ft-info"></i>
                                </div>
                                ร้องเรียน
                                <span class="badge badge-warning badge-pill badge-round float-right">3</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card border-top-pink border-top-3 border-bottom-pink border-left-blue border-left-1 border-right-blue border-right-1 border-bottom-1 box-shadow-3 pull-up">
                      <div class="card-header bg-success shadow-lg">
                          <h4 class="card-title text-center" style="color:white;font-size:20px">ทำเนียบบุคลากร</h4>
                          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                          <div class="heading-elements">                              
                          </div>
                      </div>
                      <div class="card-content collapse show">
                          <div class="card-body shadow-lg">
                            @foreach ($deps as $dep)
                            <a href="{{$dep->departs_id}}" class="list-group-item list-group-item-action">
                              <div class="d-inline mr-25">
                                  <i class="ft-user"></i>
                              </div>
                            {{$dep->departs_name}}
                              <span class="badge badge-warning badge-pill badge-round float-right">3</span>
                              @endforeach
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            height: 200,
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        </script>
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


    function startTime(){
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById("displayTime").innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        function checkTime(i){
            if(i < 10){
            i = "0" + i
            }
            return i;
        }
        }


    </script>


@endsection
