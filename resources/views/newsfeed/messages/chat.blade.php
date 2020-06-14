{{-- chat box --}}
<div class="chat-head">
    <span class="status f-online"></span>
    <h6>
        @if ($messages->first()->from == Auth::id())
        {{ App\User::find($messages->first()->to)->last_name . " " . App\User::find($messages->first()->to)->first_name }}
        @else
        {{ App\User::find($messages->first()->from)->last_name . " " . App\User::find($messages->first()->from)->first_name }}

        @endif
    </h6>
    <div class="more">
        <span class="test-click"><i class="ti-more-alt"></i></span>
        <span class="close-message"><i class="ti-close"></i></span>
    </div>
</div>
<div class="chat-list message-wrapper">
    <ul class="messages">
        @foreach ($messages as $message)
        <li class="{{ ($message->from == Auth::id()) ? 'you' : 'me' }}">
            <div class="chat-thumb">
                <img src="{{ ($message->from == Auth::id()) ? App\User::find(Auth::id())->avatar : App\User::find($message->from)->avatar }}"
                alt="">
            </div>
            <div class="notification-event">
                <span class="chat-message-item">
                    {{ $message->message }}
                </span>
                <span class="notification-date-{{ ($message->from == Auth::id()) ? 'right' : 'left' }}"><time datetime="2004-07-24T18:18"
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
{{-- end chat box --}}
