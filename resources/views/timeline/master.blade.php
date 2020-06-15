@extends('master')
@section('content')
<div class="theme-layout">
    @include('layouts.menu_top')
    <section>
        <div class="feature-photo">
            <figure>
                <div class="cover-cropped">
                    <img src="{{ ($user->cover != null) ? ('/storage/images/' . $user->cover) : asset('images/resources/timeline-1.jpg') }}"
                        alt="">

                </div>
            </figure>
            @if (Auth::user()->id == $user->id)
            <div class="add-btn">
                <span>1205 followers</span>
                <a href="{{ route('profile.edit',['id' => Auth::id()]) }}" title="" data-ripple="">Update Info</a>
            </div>
            @elseif (isset($friend))
            @switch($friend->approval_status)
            @case('0')
            @if ($friend->friend_id == Auth::user()->id)
            <div class="add-btn">
                <a href="#" title="" data-ripple="">Request Pending</a>
            </div>
            @else
            <div class="add-btn">
                <a href="{{ route('friend.delete',['id' => $friend->id]) }}" title=""
                    onclick="return confirm('Cancel request?')" data-ripple="">Sent Request</a>
            </div>
            @endif
            @break
            @case('1')
            <div class="add-btn">
                <span>1205 followers</span>
                <a href="{{ route('friend.delete',['id' => $friend->id]) }}" title=""
                    onclick="return confirm('Unfriend?')" data-ripple=""><i class="fa fa-check"></i> Friend</a>
            </div>
            @break
            @default
            <div class="add-btn">
                <span>1205 followers</span>
                <a href="{{ route('friend.add',['friendId' => $user->id]) }}" title="" data-ripple="">Add Friend</a>
            </div>
            @endswitch
            @else
            <div class="add-btn">
                <span>1205 followers</span>
                <a href="{{ route('friend.add',['friendId' => $user->id]) }}" title="" data-ripple="">Add Friend</a>
            </div>
            @endif
            <form class="edit-phto" action="{{ route('upload.cover') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Cover Photo
                    <input type="file" name="cover" onchange="this.form.submit()" />
                </label>
            </form>
            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <img src="{{ $user->avatar }}" alt="">
                                <form class="edit-phto">
                                    <i class="fa fa-camera-retro"></i>
                                    <label class="fileContainer">
                                        Edit Display Photo
                                        <input type="file" />
                                    </label>
                                </form>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5>{{ $user->last_name. " " .$user->first_name }}</h5>
                                    <span>Group Admin</span>
                                </li>
                                <li>
                                    <a class="active" href="{{ route("timeline.index",$user->id) }}" title=""
                                        data-ripple="">time line</a>
                                    <a class="" href="{{ route('timeline.photos',['id' => $user->id]) }}" title=""
                                        data-ripple="">Photos</a>
                                    <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                    <a class="" href="{{ route('timeline.friends',['id' => $user->id]) }}" title=""
                                        data-ripple="">
                                        Friends
                                    </a>
                                    <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>
                                    <a class="" href="{{ route('timeline.profile',['id' => $user->id]) }}" title=""
                                        data-ripple="">about</a>
                                    <a class="" href="#" title="" data-ripple="">more</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top area -->
    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <div class="col-lg-3">
                                @include('layouts.shortcuts')
                            </div><!-- sidebar -->
                            <div class="col-lg-6">
                                @yield('timeline_content')
                            </div><!-- centerl meta -->
                            <div class="col-lg-3">
                                @include('layouts.friend')
                            </div><!-- sidebar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
</div>
@endsection
