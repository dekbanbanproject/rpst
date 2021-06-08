@extends('layouts.backentobt')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">  
            <form action="{{ url('importPosts') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf 
                    <input type="file" name="file" id="file"  >                   
                    <button type="submit" class="btn btn-sm btn-info">upload</button>  
            </form>         
        </div>       
    </div>
<br>
    <div class="row">    
        <div class="col-md-12">   
            <div class="card"> 
                <table class="table">
                    <thead class="thead text-left text-white bg-success">
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">title</th>
                            <th scope="col">body</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php $number = 0; ?>
                    @foreach($posts  as $post )
                    <?php $number++; ?>
                        <tr>
                        <th >{{ $number}}</th>
                        <td>{{ $post ->title}}</td>
                        <td>{{ $post ->body}}</td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>  
    <br>
    <form action="{{ url('exportPosts') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf                                   
            <button type="submit" class="btn btn-sm btn-warning">Download</button>  
    </form> 


@endsection