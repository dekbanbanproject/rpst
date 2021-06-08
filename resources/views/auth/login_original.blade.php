@extends('layouts.clinic_main_login')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-white bg-info">{{ __('Login') }}</div>

                <div class="card-body shadow-lg p-3 mb-2 bg-white rounded">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-7">
                                    <img src="{{ asset('img/logo/medical_login2.jpg' )}}" id="preview" alt="Image" class="img-thumbnail" style="height:270px; width:350px;">
                            </div>
                            <div class="col-sm-5">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">อีเมล์</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">รหัสผ่าน</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">เข้าสู่ระบบ
                                        <!-- {{ __('Login') }} -->
                                    </button>


                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 offset-md-12">
                                    <div class="form-check">

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                    </div>
                                </div>
                            </div>
                            <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
