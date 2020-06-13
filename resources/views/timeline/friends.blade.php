@extends('timeline.master')
@section('timeline_content')
<div class="central-meta">
    <div class="frnds">
        <ul class="nav nav-tabs">
            {{-- @if ()

            @endif --}}
            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a> <span>55</span></li>
            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span>60</span>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show " id="frends">
                <ul class="nearby-contct">
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg"
                                        alt=""></a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="time-line.html" title="">jhon kates</a></h4>
                                <span>ftv model</span>
                                <a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                <a href="#" title="" class="add-butn" data-ripple="">add friend</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="frends-req">
                <ul class="nearby-contct">
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="time-line.html" title=""><img src="images/resources/nearly5.jpg" alt=""></a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="time-line.html" title="">Amy watson</a></h4>
                                <span>ftv model</span>
                                <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
