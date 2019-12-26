@extends('layouts.app')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
    @csrf
    <span class="login100-form-title p-b-59">
        Sign Up
    </span>

    <div class="wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Tên đăng nhập</span>
        <input type="text" name="name" class="input100 form-control form-control-lg no-b @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <span class="focus-input100">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <span class="label-input100">Email</span>
        <input type="email" name="email" class="input100 form-control form-control-lg no-b @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
    </div>

    <div class="wrap-input100 validate-input">
        <span class="label-input100">Giới tính&nbsp;&nbsp;&nbsp;</span>
        <input id="name" type="radio" checked="" name="sex" value="2" required autocomplete="name" autofocus>Nam &nbsp;
        <input id="name" type="radio" name="sex" value="1" required autocomplete="name" autofocus>Nữ
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input">
        <input id="name" type="hidden" name="role" value="1" required autocomplete="name" autofocus>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Username is required">
        <span class="label-input100">Địa Chỉ</span>
        <input type="text" name="address" class="input100 form-control form-control-lg no-b @error('address') is-invalid @enderror" placeholder="Địa chỉ" value="{{ old('address') }}">
        <span class="focus-input100">
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <span class="label-input100">Mật Khẩu</span>
        <input type="password" name="password" class="input100 form-control form-control-lg no-b @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
        <span class="focus-input100">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
        <span class="label-input100">Nhập lại mật khẩu</span>
        <input id="password-confirm" type="password" name="password_confirmation" class="input100 form-control form-control-lg no-b"placeholder="Re-enter Password" required autocomplete="new-password">
        <span class="focus-input100"></span>
    </div>

    <div class="flex-m w-full p-b-33">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
                <span class="txt1">
                    I agree to the
                    <a href="#" class="txt2 hov1">
                        Terms of User
                    </a>
                </span>
            </label>
        </div>

        
    </div>

    <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn">
                Sign Up
            </button>
        </div>

        <a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
            Sign in
            <i class="fa fa-long-arrow-right m-l-5"></i>
        </a>
    </div>
</form>
@endsection
