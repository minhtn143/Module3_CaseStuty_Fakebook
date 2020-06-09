@extends('master')

@section('content')
<div class="theme-layout">
    @include('layouts.menu_top')
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
                                @yield('newsfeed_content')
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
