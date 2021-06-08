@extends('layouts.backentobt')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
    <div align="right">
        <a href="{{ url('menuleft/create')}}" class="btn btn-sm btn-info">Add Menu</a>
        </div> 
        <hr style="color:#ff6c00;">

        <div class="card">  
            <div class="card-header text-left text-white bg-success">
                      Menu 
            </div>
            <div class="card-body">
                @if(count($menus) > 0)
                        @foreach($menus as $menu)
                            <div class="well">
                                <h5><a href="/Menu/show/{{$menu->MENULEFT_ID}}">{{ $menu->MENULEFT_TITLE}}</a></h5>
                                <small>เขียนวันที่ {{$menu->created_at}}</small>
                            </div>
                            <hr class="bg-warning">
                        @endforeach
                    @else
                        <p>ไม่มี Menu Left</p>
                    @endif
                    {{$menus-> links()}}
            <hr style="color:#ff6c00;">
               
            </div>
        </div>
    </div>
</div>
</div>

@endsection