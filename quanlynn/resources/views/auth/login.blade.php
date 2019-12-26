@extends('layouts.app')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title">
        Member Login
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input type="email" name="email" class="input100 form-control form-control-lg no-b @error('email') is-invalid @enderror" placeholder="Nhập Email" value="{{  old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input type="password" name="password" class="input100 form-control form-control-lg no-b @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" required autocomplete="current-password">
        <span class="focus-input100">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Login
        </button>
    </div>

    <div class="text-center p-t-12">
        <span class="txt1">
            Bạn chưa có tài khoản?
        </span>
    </div>

    <div class="text-center p-t-136">
        <a class="txt2" href="{{ route('register') }}">
            Hãy đăng kí!
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
@endsection
