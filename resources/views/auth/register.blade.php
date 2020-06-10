@extends('layouts.landing')

@section('form')
{{-- Register form --}}
<div class="log-reg-area">
    <h2 class="log-title">Register</h2>
    <p>
        Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join
            now</a>
    </p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" required="required" id="firstname" type="text"
                class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"
                autocomplete="firstname" autofocus />
            <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
            @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" required="required" id="lastname" type="text"
                class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"
                autocomplete="lastname" autofocus />
            <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
            @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" required="required" id="email" type="email" class="@error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" autocomplete="email" />
            <label class="control-label" for="input">E-Mail Address</label><i class="mtrl-select"></i>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" required="required" class="@error('password') is-invalid @enderror" name="password"
                autocomplete="new-password" />
            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" name="password_confirmation" required
                autocomplete="new-password" />
            <label class="control-label" for="input">Confirm Password</label><i class="mtrl-select"></i>
        </div>
        <div class="form-radio">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="male" checked="checked" /><i class="check-box"></i>Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="female" /><i class="check-box"></i>Female
                </label>
            </div>
        </div>
        <div class="form-inline">
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked="checked" /><i class="check-box"></i>Accept
                    Terms
                    & Conditions ?
                </label>
            </div>
            <a href="{{ route("home") }}" class="forgot-pwd">Already have an account</a>
        </div>
        <div class="submit-btns">
            <button class="mtr-btn signin" type="submit"><span>Register</span></button>
        </div>
    </form>
</div>
@endsection
