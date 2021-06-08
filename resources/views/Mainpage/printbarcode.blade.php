<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loanoi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
<br>
<br>
<div class="container-fluid">
<div class="row">
<section class="col-md-12">
    <div class="card shadow lg">
        <div class="card-header shadow lg">
            <h5 class="float-sm-left  font-weight-bold text-success">Print Sticker</h5>         
            <a href="{{ route('Per.welcome') }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>                                                             
        </div>
             
                    <div class="card-body"> 
                   <br>
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br>  
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                        <div class="row">                            
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div>
                            <div class="col-md-2 text-center">                
                                {{$drugcodes }}  
                                <?php echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($drugcodes, 'C128',3,30) . '" alt="barcode"  height="40px" width="170px" />'; ?>
                                {{$drugnames }}
                            </div> 
                        </div>
                        <br> 
                           
                        </div>
                    </div>
                <!-- /.card -->
            </div>
        </div> 
       
  </section>
  </div>
        </div> 