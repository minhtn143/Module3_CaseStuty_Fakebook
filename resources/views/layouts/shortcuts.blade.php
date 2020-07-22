<aside class="sidebar static">
    <div class="widget">
        <h4 class="widget-title">Shortcuts</h4>
        <ul class="naves">
            <li>
                <i class="ti-clipboard"></i>
                <a href="{!! route('home') !!}" title="">News feed</a>
            </li>
            <li>
                <i class="ti-mouse-alt"></i>
                <a href="inbox.html" title="">Inbox</a>
            </li>
            <li>
                <i class="ti-files"></i>
                <a href="{{ route('timeline.index',['id' => Auth::user()->id]) }}" title="">Timeline</a>
            </li>
            <li>
                <i class="ti-user"></i>
                <a href="{{ route('timeline.friends',['id' => Auth::id()]) }}" title="">friends</a>
            </li>
            <li>
                <i class="ti-image"></i>
                <a href="{{ route('timeline.photos',['id'=>Auth::id()]) }}" title="">images</a>
            </li>
            <li>
                <i class="ti-video-camera"></i>
                <a href="timeline-videos.html" title="">videos</a>
            </li>
            <li>
                <i class="ti-comments-smiley"></i>
                <a href="messages.html" title="">Messages</a>
            </li>
            <li>
                <i class="ti-bell"></i>
                <a href="notifications.html" title="">Notifications</a>
            </li>
            <li>
                <i class="ti-share"></i>
                <a href="people-nearby.html" title="">People Nearby</a>
            </li>
            <li>
                <i class="fa fa-bar-chart-o"></i>
                <a href="insights.html" title="">insights</a>
            </li>
            <li>
                <form action="{route}"></form>
                <i class="ti-power-off"></i>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title="">Logout</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div><!-- Shortcuts -->
</aside>
