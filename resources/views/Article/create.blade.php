
<!DOCTYPE html>
<html lang="en">
    <head>         
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Loanoi') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{ asset('js/toastr.min.css') }}" rel="stylesheet">   
    <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    </head>
    <body>
      
	  
	  
	  
	    @if (session('status')) 
        swal({
                title: {{ session('status') }},                     
                icon: {{ session('statussuccess') }},
                button: "สำเร็จ",
                });              
    @endif
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    @include('..//layouts/navbarobt2')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div align="right">
                <button type="button" id="button">test</button>
                            <a href="{{ url('Article/')}}" class="btn btn-sm btn-warning">Back</a>
                        </div>   
                <hr style="color:#ff6c00;">
                    <div class="card"> 
                        @include('..//Fontend.messages') 
                    <div class="card-header text-left text-white bg-success">
                          Add Article 
                    </div>
                    <div class="card-body">
                                       
                            {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}

                                <div class="form-group col-6">
                                    {{Form::label('ARTICLE_TITLE','ชื่อเนื้อหา')}}    
                                    {{Form::text('ARTICLE_TITLE','',['class' => 'form-control','placeholder' => 'เพิ่มชื่อเนื้อหา'])}}                   
                                </div>
                                <div class="form-group">
                                    {{Form::label('ARTICLE_SUBJECT','รายละเอียดเนื้อหา')}}    
                                    {{Form::textarea('ARTICLE_SUBJECT','',['id' => 'myeditor','class' => 'form-control','placeholder' => 'กรอกรายละเอียด'])}}                            
                                </div>                                
                                <div align="right">
                                {{Form::submit('Submit',['name'=>'button','class'=>'btn btn-sm btn-info'])}}  
                                </div>  
                                
                            {!! Form::close() !!}               
                    </div> 
                </div>
            </div>
        </div>

        @include('..//layouts.footerobt') 
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <!-- <script>                                  
                CKEDITOR.replace( 'myeditor' , {
                    filebrowserImageBrowseUrl: '/filmanager/ckeditor',
                    filebrowserBrowseUrl: '/filmanager/ckeditor'
                });
            </script> -->
        <script>                                  
                CKEDITOR.replace( 'myeditor' , {
                    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            </script>

        <script>
            $('#button').on('click',function(){
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr["success"]("Data Delete","Success!")
            })
        </script>
    
    </div>
    </body>
</html>