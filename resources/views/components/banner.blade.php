@if ($banner != null && $banner->image != null)
    <img class="lazy" src="{{asset('uploads/'.$banner->image)}}" alt="{{$banner->title}}" loading="lazy">
    <div class="text">
        <div class="title">
            <h1>{{$banner->title}}</h1>
            <div class="sub_title">
                <p>{{$banner->sub_title}}</p>
            </div>

        </div>
        @if ($banner->text_btn != null)
            <a href="{{$banner->url_direction ?? '#'}}" class="btn" tabindex="0" rel="nofollow">
                {{$banner->text_btn}}
            </a>
        @endif
    </div>
@endif
