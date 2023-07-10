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
                    @foreach ($data['categories_tour'] as $key => $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $key == 0 ? "active" : "" }}" onClick="document.getElementById('pills-blog_{{$key}}').scrollIntoView();" type="button">{{$item->title}}</button>
                        </li>
                    @endforeach
                  </ul>
            </div>
        </div>
    </div>
</section>


@foreach ($data['categories_tour'] as $key => $item)
    @php
        // chạy for để lấy danh sách tour
        $tours = \App\Models\Tour::getListByIdCategory($language,$item->id, 20);
    @endphp
        @if (count($tours) > 0)
            <section class="post tour tours blog style1 {{ $key == 0 ? "pt-1" : "pt-5" }}" id="pills-blog_{{$key}}">
                <div class="container">
                    <div class="row">
                        <div class="headtitle">
                            <div class="title">
                                <h3>{{ $item->title }}</h3>
                            </div>
                        </div>
                        <div class="list-item list_tour mt-5">
                            @foreach ($tours as $itemb)
                                <article class="item">
                                    <a href="{{asset('tour/'.$itemb->slug.'/'.$language)}}">
                                        <div class="img">
                                                <picture>
                                                    <img src="{{asset('uploads/'.$itemb->image)}}" alt="{{$itemb->title}}">
                                                </picture>
                                            <div class="option">
                                                <i class="fas fa-diamond"></i>
                                                <span>
                                                    {{__($itemb->tag)}}
                                                </span>
                                            </div>
                                            {{-- <div class="saleup">
                                                <span>
                                                    Save up to 30%
                                                </span>
                                            </div> --}}
                                        </div>
                                        <div class="box_des">
                                            <div class="destination">
                                                @php
                                                    $cate = \App\Models\Category::getDetailById($language,$itemb->id_category)
                                                @endphp
                                                <span>{{$cate->title}}</span>
                                            </div>
                                            <div class="title">
                                                <h3>{{$itemb->title}}</h3>
                                                <p class="description">
                                                    {{__('From')}}
                                                    @if ($itemb->price_discount == 0)
                                                        <span class="price">USD {{$itemb->price}}</span>
                                                    @else
                                                        <span class="price_discount">USD {{$itemb->price}}</span>
                                                        <span class="price">USD {{$itemb->price_discount}}</span>
                                                    @endif
                                                    {{__('per person')}}
                                                    <svg viewBox="0 0 30 30" aria-hidden="true" class="absolute fill-current h-full inset-0 w-full" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M15 25.016C20.521 25.016 25.013 20.523 25.013 15C25.013 9.478 20.521 4.986 15 4.986C9.477 4.986 4.984 9.478 4.984 15C4.984 20.523 9.477 25.016 15 25.016ZM3 15C3 8.383 8.383 3 15 3C21.617 3 27 8.383 27 15C27 21.617 21.617 27 15 27C8.383 27 3 21.617 3 15ZM15.2925 17.5079H13.6964C13.6852 17.4678 13.6337 17.3215 13.5418 17.0692C13.4499 16.8168 13.4039 16.596 13.4039 16.4067C13.4039 16.0453 13.4526 15.6983 13.5501 15.3657C13.6476 15.033 13.7911 14.7218 13.9805 14.4322C14.1699 14.1425 14.5446 13.6794 15.1045 13.0427C15.6643 12.406 15.9443 11.8812 15.9443 11.4682C15.9443 10.6652 15.4345 10.2637 14.415 10.2637C13.9192 10.2637 13.4011 10.519 12.8607 11.0295L12 9.36896C12.7187 8.78965 13.6629 8.5 14.8329 8.5C15.7354 8.5 16.4889 8.7581 17.0933 9.27432C17.6978 9.79054 18 10.4759 18 11.3306C18 11.9156 17.89 12.4103 17.6699 12.8147C17.4499 13.2191 17.0627 13.6937 16.5084 14.2386C15.954 14.7835 15.5933 15.2366 15.4262 15.5979C15.2591 15.9593 15.1755 16.3551 15.1755 16.7852C15.1755 16.877 15.2145 17.1179 15.2925 17.5079ZM14.5822 18.678C14.961 18.678 15.2827 18.8157 15.5474 19.091C15.812 19.3663 15.9443 19.699 15.9443 20.089C15.9443 20.479 15.812 20.8117 15.5474 21.087C15.2827 21.3623 14.961 21.5 14.5822 21.5C14.2033 21.5 13.8802 21.3623 13.6128 21.087C13.3454 20.8117 13.2117 20.479 13.2117 20.089C13.2117 19.699 13.3454 19.3663 13.6128 19.091C13.8802 18.8157 14.2033 18.678 14.5822 18.678Z"></path></svg>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
@endforeach

@endsection

