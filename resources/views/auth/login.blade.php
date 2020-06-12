@extends('layouts.landing')

@section('form')
{{-- Login form --}}
<div class="log-reg-area sign">
    <h2 class="log-title">Login</h2>
    <p>
        Don’t use Fakebook Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join
            now</a>
    </p>
    <div class="text-center social-btn">
        <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Login with <b>Facebook</b></a>
        {{-- <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Login with <b>Twitter</b></a>
        <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-dark btn-block"><i class="fa fa-github"></i> Login with <b>Github</b></a> --}}
        <a href="{{ route('login.provider', 'google') }}" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Login with <b>Google</b></a>
    </div>
    <div style=" margin: 20px 0 10px;
    text-align: center;
    border-top: 1px solid #ccc;"><i style="padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;">or</i></div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="text" id="input" required="required" id="email" type="email"
                class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                autocomplete="email" autofocus />
            <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" required="required" type="password" class="@error('password') is-invalid @enderror"
                name="password" autocomplete="current-password" />
            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                <i class="check-box"></i>Always Remember Me.
            </label>
        </div>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" title="" class="forgot-pwd">Forgot
            Password?</a>
        @endif
        <div class="submit-btns">
            <button class="mtr-btn signin" type="submit"><span>Login</span></button>
            <button class="mtr-btn signup" onclick="window.location='{{ route('register') }}'"
                type="button"><span>Register</span></button>
        </div>
    </form>
</div>
@endsection
