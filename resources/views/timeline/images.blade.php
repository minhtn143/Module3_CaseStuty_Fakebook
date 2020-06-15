@extends('timeline.master')
@section('timeline_content')
<div class="central-meta">
    <ul class="photos">
        @foreach ($images as $image)
        <li>
            <a class="strip" href="{{ '/storage/images/' . $image->name }}" title="" data-strip-group="mygroup"
                data-strip-group-options="loop: false">
                <img src="{{ '/storage/images/' . $image->name }}" alt="image"></a>
        </li>
        @endforeach
    </ul>
</div><!-- photos -->
@endsection
