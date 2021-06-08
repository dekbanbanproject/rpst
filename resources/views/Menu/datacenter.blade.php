@extends('layouts.center')
@section('content')
<div class="col-md-6">
<div class="card">            
                  <div class="card-header text-left text-white bg-success">
                      ข่าวเด่น
                    </div>
                    <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>                             
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                              <img src="{{ asset('img/obt/S1.jpg')}}" class="card-img-top" style="height:170px; width:490px;"> 
                              </div>
                              <div class="carousel-item">
                              <img src="{{ asset('img/obt/S2.jpg')}}" class="card-img-top" style="height:170px; width:490px;"> 
                              </div>                             
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
              </div>
              <br>
              <div class="card">            
                  <div class="card-header text-left text-white bg-primary">
                      ประชาสัมพันธ์
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                    </div>
              </div>
              <br>
              <div class="card">            
                  <div class="card-header text-left text-white bg-warning">
                      แผนพัฒนาท้องถิ่นปี 2563
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                    </div>
              </div>
              <br>
              <div class="card">            
                  <div class="card-header text-left text-white bg-danger">
                      งานกองคลัง
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                    </div>
  </div>

  </div>
  @endsection