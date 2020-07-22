@extends('newsfeed.master')
@section('newsfeed_content')
{{-- @foreach ($users as $user)
    {{ $user->first_name }}
@endforeach --}}
<div class="central-meta">
    <div class="frnds">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show " id="frends">
                <ul class="nearby-contct">
                    @if ($users->isEmpty())
                    Not found
                    @endif
                    @foreach ($users as $user)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="{{ route('timeline.index',['id' => $user->id]) }}" title="">
                                    <img src="{{ $user->avatar }}" alt="">
                                </a>
                            </figure>
                            <div class="pepl-info">
                                <h4>
                                    <a href="{{ route('timeline.index',['id' => $user->id]) }}">
                                        {{ $user->last_name . ' ' . $user->first_name }}
                                    </a>
                                </h4>
                                @foreach ($friends as $friend)
                                @if (($friend->friend_id == Auth::user()->id && $friend->user_id == $user->id &&
                                $friend->approval_status == 1) ||
                                ($friend->user_id == Auth::user()->id && $friend->friend_id == $user->id &&
                                $friend->approval_status == 1))
                                <a href="{{ route('friend.delete',['id' => $user->id]) }}"
                                    onclick="return confirm('Unfriend?')" title="" class="add-butn"
                                    data-ripple=""><i class="fa fa-check"></i> Friend
                                </a>
                                @elseif(($friend->friend_id == Auth::user()->id && $friend->user_id == $user->id &&
                                $friend->approval_status == 0) ||
                                ($friend->user_id == Auth::user()->id && $friend->friend_id == $user->id &&
                                $friend->approval_status == 0))
                                <a href="{{ route('friend.delete',['id' => $user->id]) }}"
                                    onclick="return confirm('Cancel request?')" title="" class="add-butn"
                                    data-ripple="">Sent Requset
                                </a>
                                @endif
                                @endforeach
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
