<div class="responsive-header">
    <div class="mh-head first Sticky">
        <span class="mh-btns-left">
            <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
        </span>
        <span class="mh-text">
            <a href="newsfeed.html" title=""><img src="{{ asset('images/logo2.png') }}" alt=""></a>
        </span>
        <span class="mh-btns-right">
            <a class="fa fa-sliders" href="#shoppingbag"></a>
        </span>
    </div>
    <div class="mh-head second">
        <form class="mh-form" method="GET" action="{{ route('friend.search') }}">
            @csrf
            <input placeholder="search" name="search"/>
            <a type="submit" class="fa fa-search"></a>
        </form>
    </div>
    <nav id="menu" class="res-menu">
        <ul>
            <li><span>Home</span>
                <ul>
                    <li><a href="index-2.html" title="">Home Social</a></li>
                    <li><a href="index2.html" title="">Home Social 2</a></li>
                    <li><a href="index-company.html" title="">Home Company</a></li>
                    <li><a href="landing.html" title="">Login page</a></li>
                    <li><a href="logout.html" title="">Logout Page</a></li>
                    <li><a href="newsfeed.html" title="">news feed</a></li>
                </ul>
            </li>
            <li><span>Time Line</span>
                <ul>
                    <li><a href="time-line.html" title="">timeline</a></li>
                    <li><a href="timeline-friends.html" title="">timeline friends</a></li>
                    <li><a href="timeline-groups.html" title="">timeline groups</a></li>
                    <li><a href="timeline-pages.html" title="">timeline pages</a></li>
                    <li><a href="timeline-photos.html" title="">timeline photos</a></li>
                    <li><a href="timeline-videos.html" title="">timeline videos</a></li>
                    <li><a href="fav-page.html" title="">favourit page</a></li>
                    <li><a href="groups.html" title="">groups page</a></li>
                    <li><a href="page-likers.html" title="">Likes page</a></li>
                    <li><a href="people-nearby.html" title="">people nearby</a></li>


                </ul>
            </li>
            <li><span>Account Setting</span>
                <ul>
                    <li><a href="create-fav-page.html" title="">create fav page</a></li>
                    <li><a href="edit-account-setting.html" title="">edit account setting</a></li>
                    <li><a href="edit-interest.html" title="">edit-interest</a></li>
                    <li><a href="edit-password.html" title="">edit-password</a></li>
                    <li><a href="edit-profile-basic.html" title="">edit profile basics</a></li>
                    <li><a href="edit-work-eductation.html" title="">edit work educations</a></li>
                    <li><a href="messages.html" title="">message box</a></li>
                    <li><a href="inbox.html" title="">Inbox</a></li>
                    <li><a href="notifications.html" title="">notifications page</a></li>
                </ul>
            </li>
            <li><span>forum</span>
                <ul>
                    <li><a href="forum.html" title="">Forum Page</a></li>
                    <li><a href="forums-category.html" title="">Fourm Category</a></li>
                    <li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
                    <li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
                </ul>
            </li>
            <li><span>Our Shop</span>
                <ul>
                    <li><a href="shop.html" title="">Shop Products</a></li>
                    <li><a href="shop-masonry.html" title="">Shop Masonry Products</a></li>
                    <li><a href="shop-single.html" title="">Shop Detail Page</a></li>
                    <li><a href="shop-cart.html" title="">Shop Product Cart</a></li>
                    <li><a href="shop-checkout.html" title="">Product Checkout</a></li>
                </ul>
            </li>
            <li><span>Our Blog</span>
                <ul>
                    <li><a href="blog-grid-wo-sidebar.html" title="">Our Blog</a></li>
                    <li><a href="blog-grid-right-sidebar.html" title="">Blog with R-Sidebar</a></li>
                    <li><a href="blog-grid-left-sidebar.html" title="">Blog with L-Sidebar</a></li>
                    <li><a href="blog-masonry.html" title="">Blog Masonry Style</a></li>
                    <li><a href="blog-list-wo-sidebar.html" title="">Blog List Style</a></li>
                    <li><a href="blog-list-right-sidebar.html" title="">Blog List with R-Sidebar</a></li>
                    <li><a href="blog-list-left-sidebar.html" title="">Blog List with L-Sidebar</a></li>
                    <li><a href="blog-detail.html" title="">Blog Post Detail</a></li>
                </ul>
            </li>
            <li><span>Portfolio</span>
                <ul>
                    <li><a href="portfolio-2colm.html" title="">Portfolio 2col</a></li>
                    <li><a href="portfolio-3colm.html" title="">Portfolio 3col</a></li>
                    <li><a href="portfolio-4colm.html" title="">Portfolio 4col</a></li>
                </ul>
            </li>
            <li><span>Support & Help</span>
                <ul>
                    <li><a href="support-and-help.html" title="">Support & Help</a></li>
                    <li><a href="support-and-help-detail.html" title="">Support & Help Detail</a></li>
                    <li><a href="support-and-help-search-result.html" title="">Support & Help Search Result</a></li>
                </ul>
            </li>
            <li><span>More pages</span>
                <ul>
                    <li><a href="careers.html" title="">Careers</a></li>
                    <li><a href="career-detail.html" title="">Career Detail</a></li>
                    <li><a href="404.html" title="">404 error page</a></li>
                    <li><a href="404-2.html" title="">404 Style2</a></li>
                    <li><a href="faq.html" title="">faq's page</a></li>
                    <li><a href="insights.html" title="">insights</a></li>
                    <li><a href="knowledge-base.html" title="">knowledge base</a></li>
                </ul>
            </li>
            <li><a href="about.html" title="">about</a></li>
            <li><a href="about-company.html" title="">About Us2</a></li>
            <li><a href="contact.html" title="">contact</a></li>
            <li><a href="contact-branches.html" title="">Contact Us2</a></li>
            <li><a href="widgets.html" title="">Widgts</a></li>
        </ul>
    </nav>
    <nav id="shoppingbag">
        <div>
            <div class="">
                <form method="post">
                    <div class="setting-row">
                        <span>use night mode</span>
                        <input type="checkbox" id="nightmode" />
                        <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Notifications</span>
                        <input type="checkbox" id="switch2" />
                        <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Notification sound</span>
                        <input type="checkbox" id="switch3" />
                        <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>My profile</span>
                        <input type="checkbox" id="switch4" />
                        <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Show profile</span>
                        <input type="checkbox" id="switch5" />
                        <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                </form>
                <h4 class="panel-title">Account Setting</h4>
                <form method="post">
                    <div class="setting-row">
                        <span>Sub users</span>
                        <input type="checkbox" id="switch6" />
                        <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>personal account</span>
                        <input type="checkbox" id="switch7" />
                        <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Business account</span>
                        <input type="checkbox" id="switch8" />
                        <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Show me online</span>
                        <input type="checkbox" id="switch9" />
                        <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Delete history</span>
                        <input type="checkbox" id="switch10" />
                        <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>Expose author name</span>
                        <input type="checkbox" id="switch11" />
                        <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div><!-- responsive header -->

<div class="topbar stick">
    <div class="logo">
        <a title="" href="{{ route('home') }}"><img src="https://i.imgur.com/xUJ7MR3.png" style="height: 60px"
                alt=""></a>
    </div>

    <div class="top-area">
        <div class="top-search">
            <form method="GET" action="{{ route('friend.search') }}" class="">
                <input type="text" placeholder="Search Friend" name="search">
                <button data-ripple type="submit"><i class="ti-search"></i></button>
            </form>
        </div>
        <ul class="setting-area">
            <li><a href="{{ route('home') }}" title="Home" class="text-white"><i class="ti-home"></i></a></li>
            <li>
                <a href="#" title="Notification" class="text-white" data-ripple="">
                    <i class="ti-user"></i><span class="bg-danger text-white">
                        @if ($friendRequests->count()>0)
                        {{ $friendRequests->count() }}
                        @endif
                    </span>
                </a>
                <div class="dropdowns">
                    <span>{{ $friendRequests->count() }} Friend Request</span>
                    <ul class="drops-menu">
                        @foreach ($friendRequests as $request)
                        <li>
                            <a title="">
                                <img src="{{ App\User::find($request->user_id)->avatar }}" alt="">
                                <div class="mesg-meta">
                                    <h6>{{ App\User::find($request->user_id)->last_name . " " . App\User::find($request->user_id)->first_name }}
                                    </h6>
                                    <span>You have a friend request</span>
                                    <span role="button" class="btn-link text-primary"
                                        onclick="location.href='{{ route('friend.accept',['id' => $request->id]) }}'">Accept</span>
                                    <span role="button" class="btn-link"
                                        onclick="location.href='{{ route('friend.delete',['id' => $request->id]) }}'">Delete
                                    </span>
                                    <i>{{ $request->created_at }}</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="notifications.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            <li>
                {{-- Comments --}}
                <a href="#" title="Messages" class="text-white" data-ripple=""><i class="ti-comment"></i><span
                        class="text-white bg-danger"></span></a>
                <div class="dropdowns">
                    <span>New Messages</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-1.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                    </ul>
                    <a href="messages.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            <li>
                {{-- Notifications --}}
                <a href="#" title="Notifications" class="text-white" data-ripple=""><i class="ti-bell"></i><span
                        class="bg-danger text-white"></span></a>
                <div class="dropdowns">
                    <span>New Messages</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-1.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                    </ul>
                    <a href="messages.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
        </ul>
        <div class="user-img">
            <img src="{{ Auth::user()->avatar }}" style="width: 45px" alt="">
            <span class="status f-online"></span>
            <div class="user-setting">
                <a href="#" title=""><span class="status f-online"></span>online</a>
                <a href="#" title=""><span class="status f-away"></span>away</a>
                <a href="#" title=""><span class="status f-off"></span>offline</a>
                <a href="#" title=""><i class="ti-user"></i> view profile</a>
                <a href="{{ route('profile.edit',['id' => Auth::id()]) }}" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                <a href="#" title=""><i class="ti-target"></i>activity log</a>
                <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title=""><i class="ti-power-off"></i>log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <span class="ti-menu main-menu text-white" data-ripple=""></span>
    </div>
</div><!-- topbar -->

<div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>use night mode</span>
            <input type="checkbox" id="nightmode1" />
            <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notifications</span>
            <input type="checkbox" id="switch22" />
            <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notification sound</span>
            <input type="checkbox" id="switch33" />
            <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>My profile</span>
            <input type="checkbox" id="switch44" />
            <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show profile</span>
            <input type="checkbox" id="switch55" />
            <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>Sub users</span>
            <input type="checkbox" id="switch66" />
            <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>personal account</span>
            <input type="checkbox" id="switch77" />
            <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Business account</span>
            <input type="checkbox" id="switch88" />
            <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show me online</span>
            <input type="checkbox" id="switch99" />
            <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Delete history</span>
            <input type="checkbox" id="switch101" />
            <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Expose author name</span>
            <input type="checkbox" id="switch111" />
            <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
</div><!-- side panel -->
