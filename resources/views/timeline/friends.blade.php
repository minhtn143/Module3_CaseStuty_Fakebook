@extends('timeline.master')
@section('timeline_content')
<div class="central-meta">
    <div class="frnds">
        <ul class="nav nav-tabs">
            @if (Auth::user()->id == $user->id)
            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a>
                <span>{{ $friendList->count() }}</span></li>
            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend
                    Requests</a><span>{{ $friendRequests->count() }}</span>
            </li>
            @else
            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Friends</a>
                <span>{{ $userFriendList->count() }}</span></li>
            @endif
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show " id="frends">
                <ul class="nearby-contct">
                    @if (Auth::user()->id == $user->id)
                    @foreach ($friendList as $friend)
                    @switch(Auth::user()->id)
                    @case($friend->user_id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="{{ route('timeline.index',['id' => $friend->friend_id]) }}" title="">
                                    <img src="{{ App\User::find($friend->friend_id)->avatar }}" alt="">
                                </a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="time-line.html" title="">
                                        {{ App\User::find($friend->friend_id)->last_name . ' ' . App\User::find($friend->friend_id)->first_name }}
                                    </a>
                                </h4>
                                <a href="{{ route('friend.delete',['id' => $friend->user_id]) }}" title=""
                                    class="add-butn" style="background-color: lightslategray"
                                    data-ripple="">unfriend</a>
                                {{-- <a href="#" title="" class="add-butn" data-ripple="">add friend</a> --}}
                            </div>
                        </div>
                    </li>
                    @break
                    @case($friend->friend_id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="{{ route('timeline.index',['id' => $friend->user_id]) }}" title="">
                                    <img src="{{ App\User::find($friend->user_id)->avatar }}" alt="">
                                </a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="{{ route('timeline.index',['id' => $friend->user_id]) }}" title="">
                                        {{ App\User::find($friend->user_id)->last_name . ' ' . App\User::find($friend->user_id)->first_name }}
                                    </a>
                                </h4>
                                <a href="{{ route('friend.delete',['id' => $friend->user_id]) }}" title=""
                                    class="add-butn" style="background-color:lightslategray" data-ripple="">unfriend</a>
                                {{-- <a href="#" title="" class="add-butn" data-ripple="">add friend</a> --}}
                            </div>
                        </div>
                    </li>
                    @break
                    @default
                    @endswitch
                    @endforeach
                    @else
                    @foreach ($userFriendList as $friend)
                    @switch($user->id)
                    @case($friend->user_id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="{{ route('timeline.index',['id' => $friend->friend->id]) }}" title="">
                                    <img src="{{ App\User::find($friend->friend_id)->avatar }}" alt="">
                                </a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="{{ route('timeline.index',['id' => $friend->friend->id]) }}" title="">
                                        {{ App\User::find($friend->friend_id)->last_name . ' ' . App\User::find($friend->friend_id)->first_name }}
                                    </a>
                                </h4>
                                <a href="#" title="" class="add-butn" data-ripple="">add friend</a>
                            </div>
                        </div>
                    </li>
                    @break
                    @case($friend->friend_id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="time-line.html" title="">
                                    <img src="{{ App\User::find($friend->user_id)->avatar }}" alt="">
                                </a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="time-line.html" title="">
                                        {{ App\User::find($friend->user_id)->last_name . ' ' . App\User::find($friend->user_id)->first_name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </li>
                    @break
                    @default
                    @endswitch
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="tab-pane fade" id="frends-req">
                <ul class="nearby-contct">
                    @foreach ($friendRequests as $request)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="" title=""><img src="{{ App\User::find($request->user_id)->avatar }}"
                                        alt=""></a>
                            </figure>
                            <div class="pepl-info">
                                <h4>
                                    <a href="{{ route('timeline.index',['id' => $request->user_id]) }}"
                                        title="">{{ App\User::find($request->user_id)->last_name . " " . App\User::find($request->user_id)->first_name }}
                                    </a>
                                </h4>
                                <a href="{{ route('friend.delete',['id' => $request->id]) }}" title=""
                                    class="add-butn more-action" data-ripple="">delete Request</a>
                                <a href="{{ route('friend.accept',['id' => $request->id]) }}" title="" class="add-butn"
                                    data-ripple="">Confirm</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
