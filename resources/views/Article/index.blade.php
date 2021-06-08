@extends('layouts.backentobt')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-12">
    @include('..//Fontend.messages')
        <div align="right">
            <a href="{{ url('Article/create')}}" class="btn btn-sm btn-info">Add Article</a>
        </div> 
        <hr style="color:#ff6c00;">
        
        <div class="card">  
            <div class="card-header text-left text-white bg-success">
                      Article
            </div>
            <div class="card-body">                   
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <div class="well">
                            <h5><a href="{{ url('Article/show/'.$article->ARTICLE_ID)}}">{{ $article->ARTICLE_TITLE}}</a></h5>                          
                            <small>เขียนวันที่ {{$article->created_at}}</small>
                        </div>
                        <div align="right">
                            <a href="{{ url('Article/edit/'.$article->ARTICLE_ID)}}" class="btn btn-sm btn-warning">Edit Article</a>
                            <a href="{{ url('Article/destroy/'.$article->ARTICLE_ID)}}" class="btn btn-sm btn-danger">delete Article</a>
                        </div>
                        
                        <hr class="bg-warning">
                    @endforeach
                @else
                    <p>ไม่มี Post</p>
                @endif
                {{$articles-> links()}}
            <hr style="color:#ff6c00;">
                
            </div>
        </div>
    </div>
</div>
</div>

@endsection