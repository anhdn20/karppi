@extends('site.layout')
@section('content')


<section class="post blog style1" id="pills-blog_0">
    <div class="container">
        <div class="row">
            <div class="headtitle">
                <div class="title">
                    <h3>Blogs</h3>
                </div>
            </div>
            <div class="list-item mt-5">
                @foreach ($data['blogs'] as $itemb)
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


@endsection

