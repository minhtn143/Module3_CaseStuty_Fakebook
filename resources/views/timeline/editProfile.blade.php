@extends('timeline.master')
@section('timeline_content')
<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>

        <form method="post" action="{{ route('profile.update',['id'=>Auth::id()]) }}">
            @csrf
            <div class="form-group half">
                <input type="text" id="input" name="first_name" value="{{ Auth::user()->first_name }}" />
                <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group half">
                <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" />
                <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <input type="text" value="{{ Auth::user()->email }}" readonly/>
                <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection"
                        class="__cf_email__" data-cfemail="4b0e262a22270b">[email&#160;protected]</a></label><i
                    class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <input type="text" name="phone" value="{{ Auth::user()->phone }}" />
                <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
            </div>
            <div class="dob">
                <div class="form-group">
                    <input type="date" name="dob" value="{{ Auth::user()->dob }}">
                    <label class="control-label" for="input">Date of birth</label><i class="mtrl-select"></i>

                </div>
            </div>
            <div class="form-radio">
                <div class="radio">
                    <label>
                        <input type="radio" value="Male" name="gender" @if (strtolower(Auth::user()->gender) ==
                        'male')
                        checked
                        @endif><i class="check-box"></i>Male
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="Female" @if (strtolower(Auth::user()->gender) ==
                        'female')
                        checked
                        @endif><i class="check-box"></i>Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="address" value="{{ Auth::user()->address }}" />
                <label class="control-label" for="input">Address</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <input type="text" name="school" value="{{ Auth::user()->school }}" />
                <label class="control-label" for="input">Education</label><i class="mtrl-select"></i>
            </div>
            <div class="form-group">
                <textarea rows="4" id="textarea" name="about_me">{{ Auth::user()->about_me }}</textarea>
                <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
            </div>
            <div class="submit-btns">
                <button type="button" class="mtr-btn"><span>Cancel</span></button>
                <button type="submit" class="mtr-btn"><span>Update</span></button>
            </div>
        </form>
    </div>
</div>
@endsection
