<aside class="sidebar static">
    <div class="widget friend-list stick-widget user-wrapper">
        <h4 class="widget-title">Friends</h4>
        <div id="searchDir"></div>
        <ul id="people-list" class="friendz-list users">
            @foreach ($friendList as $friend)
            @if ($friend->friend_id == Auth::id())
            <li class="user" id="{{ $friend->user_id }}">
                <figure>
                    <img class="list_friend" src="{{ App\User::find($friend->user_id)->avatar }}" alt="">
                </figure>
                @foreach ($users as $user)
                @if ($user->id == $friend->user_id)
                @if($user->unread)
                <span class="pending">{{ $user->unread }}</span>
                @endif
                @break
                @endif
                @endforeach
                <div class="friendz-meta">
                    <a href="{{ route('timeline.index',['id' => $friend->user_id]) }}">
                        {{ App\User::find($friend->user_id)->last_name . " " . App\User::find($friend->user_id)->first_name }}</a>
                </div>
            </li>
            @elseif($friend->user_id == Auth::user()->id)
            <li class="user" id="{{ $friend->friend_id }}">
                <figure>
                    <img class="list_friend" data-id="{{ $friend->friend_id }}"
                        src="{{ App\User::find($friend->friend_id)->avatar }}" alt="">
                </figure>
                @foreach ($users as $user)
                @if ($user->id == $friend->friend_id)
                @if($user->unread)
                <span class="pending">{{ $user->unread }}</span>
                @endif
                @break
                @endif
                @endforeach
                <div class="friendz-meta">
                    <a href="{{ route('timeline.index',['id' => $friend->friend_id]) }}">
                        {{ App\User::find($friend->friend_id)->last_name . " " . App\User::find($friend->friend_id)->first_name }}</a>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
        <div id="messages" class="chat-box show ui-widget-content">

        </div>
    </div><!-- friends list sidebar -->
</aside>
