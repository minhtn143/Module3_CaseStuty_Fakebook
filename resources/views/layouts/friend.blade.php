<aside class="sidebar static">
    <div class="widget friend-list stick-widget">
        <h4 class="widget-title">Friends</h4>
        <div id="searchDir"></div>
        <ul id="people-list" class="friendz-list">
            @foreach ($friendList as $friend)
            <li>
                <figure>
                    <img class="list_friend" data-id="{{ $friend->friend_id }}" src="{{ App\User::find($friend->friend_id)->avatar }}" alt="">
                    <span class="status f-online"></span>
                </figure>
                <div class="friendz-meta">
                    <a href="{{ route('timeline.index',['id' => $friend->friend_id]) }}">{{ App\User::find($friend->friend_id)->last_name . " " . App\User::find($friend->friend_id)->first_name }}</a>
                    {{-- <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__"
                            data-cfemail="a0d7c9ced4c5d2d3cfccc4c5d2e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></i> --}}
                </div>
            </li>
            @endforeach
        </ul>
        {{-- chat box --}}
        @foreach ($friendList as $friend)
        <div class="chat-box box-chat-{{ $friend->friend_id }}">
            <div class="chat-head">
                <span class="status f-online"></span>
                <h6>
                    {{ App\User::find($friend->friend_id)->last_name . " " . App\User::find($friend->friend_id)->first_name }}
                </h6>
                <div class="more">
                    <span><i class="ti-more-alt"></i></span>
                    <span class="close-mesage"><i class="ti-close"></i></span>
                </div>
            </div>
            <div class="chat-list">
                <ul>
                    <li class="me">
                        <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts
                                and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18"
                                    class="entry-date updated">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                    <li class="you">
                        <div class="chat-thumb"><img src="images/resources/chatlist2.jpg" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts
                                and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18"
                                    class="entry-date updated">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                    <li class="me">
                        <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts
                                and Jake’s gonna get the drinks
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18"
                                    class="entry-date updated">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                </ul>
                <form class="text-box">
                    <textarea placeholder="Post enter to post..."></textarea>
                    <div class="add-smiles">
                        <span title="add icon" class="em em-expressionless"></span>
                    </div>
                    <div class="smiles-bunch">
                        <i class="em em---1"></i>
                        <i class="em em-smiley"></i>
                        <i class="em em-anguished"></i>
                        <i class="em em-laughing"></i>
                        <i class="em em-angry"></i>
                        <i class="em em-astonished"></i>
                        <i class="em em-blush"></i>
                        <i class="em em-disappointed"></i>
                        <i class="em em-worried"></i>
                        <i class="em em-kissing_heart"></i>
                        <i class="em em-rage"></i>
                        <i class="em em-stuck_out_tongue"></i>
                    </div>
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        @endforeach
        {{-- end chat box --}}
    </div><!-- friends list sidebar -->
</aside>
