@extends('layouts.clinic_main_login')

@section('content')

<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card ">
            <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="card-header text-white bg-info" >{{ __('Register') }}</div>

                    <div class="card-body shadow-lg p-3 mb-2 bg-white rounded">
                    
                        <input type="hidden" name="status" value="{{ app('request')->input('status')}}">

                        <div class="form-row">
                            <div class="col-sm-7">
                            
                                    <img src="{{ asset('img/logo/medical_login.jpg' )}}" id="preview" alt="Image" class="img-thumbnail" style="height:270px; width:350px;">
                            </div> 
                            <div class="col-sm-5">  
                                <div class="form-group row">
                                    <div class="col-md-12">
                                  
                                        <input id="name" type="text" placeholder="ชื่อ-นามสกุล" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="อีเมล์" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="รหัสผ่าน" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" placeholder="รหัสผ่านอีกครั้ง" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>                                                   
                            </div> 
                            </div> 

                      


                        <!-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> -->

                        <hr style="bg-info">
                    <div align="right">
                        <button type="submit" class="btn btn-sm btn-primary">ลงทะเบียน</button>  
                    </div>                    
                </div>



                    </form>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection
