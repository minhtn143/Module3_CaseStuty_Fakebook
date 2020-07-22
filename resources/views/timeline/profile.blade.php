@extends('timeline.master')
@section('timeline_content')
<div class="central-meta">
    <div class="about">
        <div class="personal">
            <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
            <p>{{ $user->about_me }}</p>
        </div>
        <div class="d-flex flex-row mt-2">
            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                <li class="nav-item">
                    <a href="#basic" class="nav-link active show text-white" style="background-color: #088dcd"
                        data-toggle="tab">Basic info</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="basic">
                    <ul class="basics">
                        <li><i class="ti-user"></i>{{ $user->last_name . ' ' . $user->first_name }}</li>
                        <li><i class="ti-map-alt"></i>{{ $user->address }}</li>
                        <li><i class="ti-mobile"></i>{{ $user->phone }}</li>
                        <li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection"
                                class="__cf_email__"
                                data-cfemail="3c4553494e515d55507c59515d5550125f5351">[email&#160;protected]</a></li>
                        <li><i class="ti-world"></i>www.yoursite.com</li>
                        <li><i class="fa fa-university"></i></i>{{ $user->school }}</li>
                        <li><i class="fa fa-birthday-cake"></i>{{ $user->dob }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
