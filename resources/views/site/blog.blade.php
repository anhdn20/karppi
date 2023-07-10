@extends('site.layout')
@section('content')

<section class="banner home home_section_b">
    <div class="boxbanner">
        <x-banner :banner="$data['banner_blog']"></x-banner>
    </div>
</section>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="boxtab">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    @foreach ($data['categories_blog'] as $key => $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $key == 0 ? "active" : "" }}" onClick="document.getElementById('pills-blog_{{$key}}').scrollIntoView();" type="button">{{$item->title}}</button>
                        </li>
                    @endforeach
                  </ul>
            </div>
        </div>
    </div>
</section>


@foreach ($data['categories_blog'] as $key => $item)
    @php
        // chạy for để lấy danh sách bài viết
        $blogs = \App\Models\Blog::getByCategoryId($language,$item->id,true);
    @endphp
    <section class="post blog style1 {{ $key == 0 ? "pt-1" : "pt-5" }}" id="pills-blog_{{$key}}">
        <div class="container">
            <div class="row">
                <div class="headtitle">
                    <div class="title">
                        <h3>{{ $item->title }}</h3>
                    </div>
                </div>
                <div class="list-item mt-5">
                    @foreach ($blogs as $itemb)
                        <article class="item">
                                <div class="img">
                                    <img class="lazy" src="{{asset('uploads/'.$itemb->image)}}" alt="{{$itemb->title}}">
                                </div>
                                <div class="box_des">
                                    <div class="title">
                                        <a href="{{asset('blog/'.$item->slug.'/'.$language)}}" class="description">{{$itemb->title}} <i class="fal fa-long-arrow-right"></i>​</a>
                                    </div>
                                </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endforeach

@endsection

