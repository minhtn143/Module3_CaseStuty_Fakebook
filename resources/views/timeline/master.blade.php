@extends('master')
@section('content')
    <div class="theme-layout">
        @include('layouts.menu_top')
        <section>
            <div id="open-modal" class="modal-window">
                <div style="background: wheat;">
                    <a href="#" title="Close" class="modal-close">X</a>
                    <header class="text-white text-center">
                        <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" width="150" alt=""
                             style="width: 150px" class="mb-4">
                    </header>
                    <div class="row py-4">
                        <div class="col-lg-6 mx-auto">
                            <!-- Upload image input-->
                            <form action="{{route('user.update.avatar')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Tải ảnh lên</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Tải ảnh lên
                                        </small></label>
                                </div>
                            </div>

                            <!-- Uploaded image area-->
                            <p class="font-italic text-white text-center">The image uploaded will be rendered inside the
                                box below.</p>
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                                              class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                <div style="float: right"><button type="submit">Lưu</button></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="feature-photo">
                <figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
                <div class="add-btn">
                    <span>1205 followers</span>
                    <a href="#" title="" data-ripple="">Add Friend</a>
                </div>
                <form class="edit-phto">
                    <div class="btn btn-default edit-bg" data-ip-modal="#bgModal">
                        <i class="fa fa-camera-retro"></i>
                        <label class="fileContainer">
                            Edit Cover Photo
                        </label>
                    </div>
                </form>
                <div class="container-fluid">
                    <div class="row merged">
                        <div class="col-lg-2 col-sm-3">
                            <div class="user-avatar">
                                <figure>
                                    <img src="{{asset('images/resources/friend-avatar4.jpg')}}" alt="">
                                    <label class="fileContainer" style="color: black">

                                        <a style="margin-bottom: 8px" class="btn" href="#open-modal"><i
                                                class="fa fa-camera-retro"></i>Edit Display Photo</a>
=======
<div class="theme-layout">
    @include('layouts.menu_top')
    <section>
        <div class="feature-photo">
            <figure><img src="{{ asset('images/resources/timeline-1.jpg') }}" alt=""></figure>
            <div class="add-btn">
                <span>1205 followers</span>
                <a href="#" title="" data-ripple="">Add Friend</a>
            </div>
            <form class="edit-phto">
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Cover Photo
                    <input type="file" />
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
                                </figure>
                            </div>
                        </div>
                        <!-- upload -->
                        <div class="col-lg-10 col-sm-9">
                            <div class="timeline-info">
                                <ul>
                                    <li class="admin-name">
                                        <h5>{{$user->first_name}} {{$user->last_name}}</h5>
                                    </li>
                                    <li>
                                        <a class="active" href="time-line.html" title="" data-ripple="">time
                                            line</a>
                                        <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                        <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                        <a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                                        <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>
                                        <a class="" href="about.html" title="" data-ripple="">about</a>
                                        <a class="" href="#" title="" data-ripple="">more</a>
                                    </li>
                                </ul>
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
                                    <a class="active" href="{{ route("timeline.index",$user->id) }}" title="" data-ripple="">time line</a>
                                    <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                    <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                    <a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                                    <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>
                                    <a class="" href="about.html" title="" data-ripple="">about</a>
                                    <a class="" href="#" title="" data-ripple="">more</a>
                                </li>
                            </ul>

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
