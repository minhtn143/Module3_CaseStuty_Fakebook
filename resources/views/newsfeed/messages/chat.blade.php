{{-- chat box --}}
<div class="chat-box show">
    <div class="chat-head">
        <span class="status f-online"></span>
        <h6>
            {{-- {{ App\User::find($friend->friend_id)->last_name . " " . App\User::find($friend->friend_id)->first_name }} --}}
        </h6>
        <div class="more">
            <span><i class="ti-more-alt"></i></span>
            <span class="close-mesage"><i class="ti-close"></i></span>
        </div>
    </div>
    <div class="chat-list message-wrapper">
        <ul class="messages">
            @foreach ($messages as $message)
            <li class="{{ ($message->from == Auth::id()) ? 'me' : 'you' }}">
                <div class="chat-thumb">
                    {{-- <img src="{{ ($message->from == Auth::id()) ? App\User::find(Auth::id())->avatar : App\User::find($message->form)->avatar }}"
                        alt=""> --}}
                </div>
                <div class="notification-event">
                    <span class="chat-message-item">
                        {{ $message->message }}
                    </span>
                    <span class="notification-date"><time datetime="2004-07-24T18:18"
                            class="entry-date updated">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</time>
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
        <form class="text-box input-text">
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
{{-- end chat box --}}
