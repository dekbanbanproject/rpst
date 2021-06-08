
<!DOCTYPE html>
<html lang="en">
    <head>         
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Loanoi') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     
            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    </head>
    <body>
        
        @include('..//layouts/navbarobt2')

        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div align="right">
                            <a href="{{ url('menuleft/')}}" class="btn btn-sm btn-warning">Back</a>
                        </div>  
                <hr style="color:#ff6c00;">
                    <div class="card"> 
                        @include('..//Fontend.messages') 
                    <div class="card-header text-left text-white bg-success">
                            Menu 
                    </div>
                    <div class="card-body">
                                    
                            {!! Form::open(['action' => 'MenuleftsController@store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{Form::label('MENULEFT_TITLE','ชื่อเมนู')}}    
                                    {{Form::text('MENULEFT_TITLE','',['class' => 'form-control','placeholder' => 'เพิ่มชื่อเมนูหลัก'])}}                   
                                </div>
                                <div class="form-group">
                                    {{Form::label('MENULEFT_SUBJECT','เมนูย่อย')}}    
                                    {{Form::textarea('MENULEFT_SUBJECT','',['id' => 'myeditor','class' => 'form-control','placeholder' => 'เพิ่มเมนูย่อย'])}}                            
                                </div>
                                <div align="right">
                                {{Form::submit('Submit',['class'=>'btn btn-sm btn-info'])}}  
                                </div>  
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'myeditor' );
                                </script>
                            {!! Form::close() !!}               
                    </div> 
                </div>
            </div>
        </div>
        </div>
        @include('..//layouts.footerobt') 

    </div>
    </body>
</html>