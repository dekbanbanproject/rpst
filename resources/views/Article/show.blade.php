@extends('layouts.backentobt')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="right">
                <a href="{{ url('Article/')}}" class="btn btn-sm btn-warning">Back</a>
            </div> 
            <hr style="color:#ff6c00;">
            <div class="card">  
            <div class="card-header text-left text-white bg-success">
            <h2>{{$articles->ARTICLE_TITLE}}</h2> 
            </div>
            <div class="card-body">  
                <div>
                    <h5>{!! $articles->ARTICLE_SUBJECT !!} </h5>
                    <small>เขียนวันที่ {{$articles->created_at}}</small>
                </div> 
                <hr>
                <a href="{{ url('Article/edit/'.$articles->ARTICLE_ID)}}" class="btn btn-sm btn-warning">Edit Article</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection