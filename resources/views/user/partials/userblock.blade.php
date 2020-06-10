<div class="media p-3">
  <a href="{{route('profile.index', ['id'=>$user->id])}}">
  <img src="{{Auth::user()->getAvatarURL()}}" alt="{{Auth::user()->getNameOrUsername()}}" class="mr-3 rounded-circle" style="width:60px;">
  <div class="media-body">
    <h5>{{Auth::user()->getNameOrUsername()}}</h5>
    @if (Auth::user()->location)
      <p>{{Auth::user()->location}}</p>
    @endif
  </div>
  </a>
</div>
