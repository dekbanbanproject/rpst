@extends('layouts.backentobt')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">  
            <div class="card-header text-left text-white bg-success">
            <h4>{{$menulefts->MENULEFT_TITLE}}</h4> 
            </div>
            <div class="card-body">
                
               
                
                <div>
                <h5>{!! $menulefts->MENULEFT_SUBJECT !!} </h5>
                <small>เขียนวันที่ {{$menulefts->created_at}}</small>
                </div> 
                <hr>
                <a href="{{ url('menuleft/create')}}" class="btn btn-sm btn-info">Add Menu</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection