@extends('layouts.backentobt')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">   
            <div class="card">  
                <div class="card-header text-left text-white bg-success">
                     Blog Menu
                </div>
                <div class="card-body">
                @if(count($menus) > 0)
                        @foreach($menus as $menu)
                            <div class="well">
                                <h5><a href="/fontobt/show/{{$menu->MENULEFT_ID}}">{{ $menu->MENULEFT_TITLE}}</a></h5>
                                <small>เขียนวันที่ {{$menu->created_at}}</small>
                            </div>
                            <hr class="bg-warning">
                        @endforeach
                    @else
                        <p>ไม่มี Menu Left</p>
                    @endif
                    {{$menus-> links()}}
                <hr>
                    <a href="{{ url('menuleft/create')}}" class="btn btn-sm btn-success">Add Menu</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">   
            <div class="card">  
                <div class="card-header text-left text-white bg-primary">
                     Blog article
                </div>
                <div class="card-body">
                @if(count($menus) > 0)
                        @foreach($articles as $article)
                            <div class="well">
                                <h5><a href="/Article/show/{{$article->ARTICLE_ID}}">{{ $article->ARTICLE_TITLE}}</a></h5>
                                <small>เขียนวันที่ {{$article->created_at}}</small>
                            </div>
                            <hr class="bg-warning">
                        @endforeach
                    @else
                        <p>ไม่มี article Left</p>
                    @endif
                    {{$articles-> links()}}
                <hr>
                    <a href="{{ url('article/create')}}" class="btn btn-sm btn-info">Add Article</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection