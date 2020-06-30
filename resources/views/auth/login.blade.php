@extends('layouts.base')
@section('title')
    Login
@endsection
@section('customcss')
<style>
    /*     	Login     */
    .login {
        background: #efefee;
    }

    .login .wrapper.wrapper-login {
        display: flex;
        justify-content: center;
        align-items: center;
        height: unset;
        padding: 15px;
    }

    .login .wrapper.wrapper-login .container-login,
    .login .wrapper.wrapper-login .container-signup {
        width: 400px;
        padding: 60px 25px;
        border-radius: 5px;
    }

    .login .wrapper.wrapper-login .container-login:not(.container-transparent),
    .login .wrapper.wrapper-login .container-signup:not(.container-transparent) {
        background: #ffffff;
        -webkit-box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        -moz-box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        border: 1px solid #ebecec;
    }

    .login .wrapper.wrapper-login .container-login h3,
    .login .wrapper.wrapper-login .container-signup h3 {
        font-size: 19px;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .login .wrapper.wrapper-login .container-login .form-sub,
    .login .wrapper.wrapper-login .container-signup .form-sub {
        align-items: center;
        justify-content: space-between;
        padding: 8px 10px;
    }

    .login .wrapper.wrapper-login .container-login .btn-login,
    .login .wrapper.wrapper-login .container-signup .btn-login {
        padding: 15px 0;
        width: 135px;
    }

    .login .wrapper.wrapper-login .container-login .form-action,
    .login .wrapper.wrapper-login .container-signup .form-action {
        text-align: center;
        padding: 25px 10px 0;
    }

    .login .wrapper.wrapper-login .container-login .form-action-d-flex,
    .login .wrapper.wrapper-login .container-signup .form-action-d-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .login .wrapper.wrapper-login .container-login .login-account,
    .login .wrapper.wrapper-login .container-signup .login-account {
        padding-top: 10px;
        text-align: center;
    }

    .login .wrapper.wrapper-login .container-signup .form-action {
        display: flex;
        justify-content: center;
    }

    .login .wrapper.wrapper-login-full {
        justify-content: unset;
        align-items: unset;
        padding: 0 !important;
    }

    .login .login-aside {
        padding: 25px;
    }

    .login .login-aside .title {
        font-size: 36px;
    }

    .login .login-aside .subtitle {
        font-size: 18px;
    }

    .login .show-password {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
    }

    .login .custom-control-label {
        white-space: nowrap;
    }

    @media screen and (max-width: 576px) {
        .form-action-d-flex {
            flex-direction: column;
            align-items: start !important;
        }

        .login .wrapper-login-full {
            flex-direction: column;
        }

        .login .login-aside {
            width: 100% !important;
        }

        .login .login-aside .title {
            font-size: 24px;
        }

        .login .login-aside .subtitle {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 399px) {
        .wrapper-login {
            padding: 15px !important;
        }

        .container-login {
            width: 100% !important;
            padding: 60px 15px !important;
        }
    }
</style>
@endsection
@section('content')
<div class="login">
    <div class="wrapper wrapper-login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container container-login animated fadeIn">
                <div class="text-center"><a href="/"><img src="{{ asset('assets/img/logo-blk.png') }}" alt="navbar brand" class="navbar-brand" width="100"></a></div>
                <h3 class="text-center">Sign In</h3>
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror input-border-bottom" required>
                        <label for="email" class="placeholder">Email</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror input-border-bottom"
                            required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="far fa-eye toggle-pass"></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>
                        <a href="#" class="link float-right">Forget Password ?</a>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
                    </div>
                    <div class="login-account">
                        <span class="msg">Don't have an account yet ?</span>
                        <a href="/register" id="show-signup" class="link">Sign Up</a>
                    </div>
                </div>
            </div>
        </form>

        {{-- <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container container-signup animated fadeIn">
            <h3 class="text-center">Sign Up</h3>
            <div class="login-form">
                <div class="form-group form-floating-label">
                    <input id="name" name="name" type="text" class="form-control input-border-bottom" required>
                    <label for="name" class="placeholder">Nama</label>
                </div>
                <div class="form-group form-floating-label">
                    <input id="email" name="email" type="email" class="form-control input-border-bottom" required>
                    <label for="email" class="placeholder">Email</label>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom"
                        required>
                    <label for="password" class="placeholder">Password</label>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password-confirm" name="password-confirm" type="password"
                        class="form-control input-border-bottom" required>
                    <label for="password-confirm" class="placeholder">Confirm Password</label>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
                <div class="row form-sub m-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                        <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
                    </div>
                </div>
                <div class="form-action">
                    <a href="#" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign Up</a>
                </div>
            </div>
        </div>
        </form> --}}
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
<p>{{ $message }}</p>
<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
@section('customjs')
<script>
    $(".toggle-pass").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>

@endsection
