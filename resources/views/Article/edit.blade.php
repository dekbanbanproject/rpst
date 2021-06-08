
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
                            <a href="{{ url('Article/')}}" class="btn btn-sm btn-warning">Back</a>
                        </div>   
                <hr style="color:#ff6c00;">
                    <div class="card"> 
                       
                    <div class="card-header text-left text-white bg-success">
                          Edit Article 
                    </div>
                    <div class="card-body">                                       
                            {!! Form::open(['action' => ['ArticlesController@update',$articles->ARTICLE_ID], 'method' => 'POST']) !!}

                                <div class="form-group col-6">
                                    {{Form::label('ARTICLE_TITLE','ชื่อเนื้อหา')}}    
                                    {{Form::text('ARTICLE_TITLE',$articles->ARTICLE_TITLE,['class' => 'form-control','placeholder' => 'เพิ่มชื่อเนื้อหา'])}}                   
                                </div>
                                <div class="form-group">
                                    {{Form::label('ARTICLE_SUBJECT','รายละเอียดเนื้อหา')}}    
                                    {{Form::textarea('ARTICLE_SUBJECT',$articles->ARTICLE_SUBJECT,['id' => 'myeditor','class' => 'form-control','placeholder' => 'กรอกรายละเอียด'])}}                            
                                </div>
                                {{Form::hidden('_method','PUT')}}
                                <div align="right">
                                {{Form::submit('Submit',['class'=>'btn btn-sm btn-info'])}}  
                                </div>  
                               
                            {!! Form::close() !!}               
                    </div> 
                </div>
            </div>
        </div>

        @include('..//layouts.footerobt') 

    </div>

    <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'myeditor' );
                                </script>

    </body>
</html>