@extends('site.layout')
@section('content')

<section class="banner home">
    <div class="boxbanner">
        @php
            $banner_home_head = $data['banner_home_head'];
            $banner_home_section = $data['banner_home_section'];
        @endphp
        <x-banner :banner="$banner_home_head"></x-banner>
        <div class="search_form hehe">
            <form action="{{ route('search-key') }}" method="POST">
                @csrf
                <div class="boxform">
                    <div class="icon">
                        <i class="far fa-search"></i>
                    </div>
                    <input type="text" name="keysearch" id="search-input" placeholder="{{__('Looking for stay ..')}}">
                </div>
                <div class="button_search">
                    <svg viewBox="0 0 30 30" aria-hidden="true" class="" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.601 12.817C20.601 14.899 19.816 16.804 18.332 18.327C16.898 19.797 14.942 20.607 12.824 20.607C10.747 20.607 8.844 19.82 7.324 18.333C4.305 15.31 4.303 10.363 7.318 7.306C8.785 5.837 10.741 5.028 12.824 5.028C14.902 5.028 16.804 5.814 18.325 7.302C19.793 8.737 20.601 10.696 20.601 12.817M26.693 25.285L20.408 18.989L20.6 18.739C23.577 14.861 23.198 9.333 19.718 5.881C17.863 4.023 15.402 3 12.791 3C10.179 3 7.719 4.022 5.865 5.88C2.045 9.705 2.045 15.93 5.865 19.755C7.719 21.612 10.179 22.635 12.791 22.635C14.974 22.635 17.017 21.945 18.701 20.64L18.95 20.447L25.27 26.708C25.465 26.903 25.732 27 26 27C26.267 27 26.534 26.903 26.728 26.71C27.104 26.332 27.088 25.68 26.693 25.285"></path></svg>
                </div>
            </form>
            <div id="search_results" class="hehe"></div>
        </div>
    </div>
</section>

<section class="news">
    <div class="container">
        <div class="row">
            <div class="headtitle">
                <div class="title">
                    <h3>{{ __('Latest deals & news​') }}</h3>
                </div>
                <div class="seemore">
                    <a href="#" tabindex="0" rel="nofollow">{{__('See more')}}</a>
                </div>
            </div>
            <div class="list-item">
                @if (!empty($data['tour_lastest']))
                    @foreach ($data['tour_lastest'] as $item)
                        <article class="item">
                            <a href="{{asset('tour/'.$item->slug.'/'.$language)}}">
                                <div class="img">
                                    <img class="lazy" src="{{asset('uploads/'.$item->image)}}" alt="{{$item->title}}">
                                </div>
                                <div class="box_des">
                                    <div class="info">
                                        <span>3D2N From USD 185 / pax</span>
                                    </div>
                                    <div class="title">
                                        <h3>{{$item->title}}</h3>
                                        <p class="description">{{$item->sub_title}}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section class="what">
    <div class="container">
        <div class="row">
            <div class="headtitle">
                <div class="title">
                    <h3>{{ __("What's included in your stay") }}</h3>
                </div>
                <div class="seemore">
                    <a href="#" tabindex="0" rel="nofollow">{{__('Find out more')}}</a>
                </div>
            </div>
            <div class="list-item">
                @if (!empty($data['blogs_what']))
                    @foreach ($data['blogs_what'] as  $item)
                        <article class="item">
                            <a href="{{asset('blog/'.$item->slug.'/'.$language)}}">
                                <div class="img">
                                    <img class="lazy" data-src="{{asset('uploads/'.$item->image)}}" alt="{{$item->title}}">
                                </div>
                                <div class="box_des">
                                    <div class="icon">
                                        <img src="{{asset('uploads/'.$item->icon)}}" alt="{{$item->title}}">
                                    </div>
                                    <div class="title">
                                        <h3>{{$item->title}}</h3>
                                        <p class="description">{{$item->sub_title}}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section class="tour">
    <div class="container">
        <div class="row">
            <div class="headtitle">
                <div class="title">
                    <h3>{{ __('Our resorts around the world') }}</h3>
                </div>
                <div class="seemore">
                    <a href="#" tabindex="0" rel="nofollow">{{__('See all destinations')}}</a>
                </div>
            </div>
            <div class="boxtab">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    @if (!empty($data['tour_tab']))
                        @foreach ($data['tour_tab'] as $key => $item)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$key == 0 ? "active" : ""}}" id="pills-tour-tab_{{$key}}" data-bs-toggle="pill" data-bs-target="#pills-tab_{{$key}}" type="button" role="tab" aria-controls="pills-tab_{{$key}}" aria-selected="true">{{$item->title}}</button>
                            </li>
                        @endforeach
                    @endif
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    @if (!empty($data['tour_tab']))
                        @foreach ($data['tour_tab'] as $key => $item)
                            <div class="tab-pane fade {{$key == 0 ? "show active" : ""}}" id="pills-tab_{{$key}}" role="tabpanel" aria-labelledby="pills-tour-tab_{{$key}}">
                                <div class="list-item list_tour" id="list_tour{{$key}}">
                                    @php
                                        // lấy danh sách bài viết
                                        $listTour = \App\Models\Tour::getByTabId($language,$item->id, true);
                                    @endphp
                                    @foreach ($listTour as $value)
                                    @php
                                        $cate = \App\Models\Category::getDetailById($language,$value->id_category)
                                    @endphp
                                        <article class="item">
                                            <a href="{{asset('tour/'.$value->slug.'/'.$language)}}">
                                                <div class="img">
                                                    <picture>
                                                        <img src="{{asset('uploads/'.$value->image)}}" alt="{{$value->title}}">
                                                    </picture>
                                                    <div class="option">
                                                        <i class="fas fa-diamond"></i>
                                                        <span>
                                                            {{__($value->tag)}}
                                                        </span>
                                                    </div>
                                                    <div class="saleup">
                                                        <span>
                                                            {{__('Save up to')}} 30%
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="box_des">
                                                    <div class="destination">
                                                        <span>{{$cate->title}}</span>
                                                    </div>
                                                    <div class="title">
                                                        <h3>{{$value->title}}</h3>
                                                        <p class="description">
                                                            {{__('From')}}
                                                            @if ($value->price_discount == 0)
                                                                <span class="price">USD {{$value->price}}</span>
                                                            @else
                                                                <span class="price_discount">USD {{$value->price}}</span>
                                                                <span class="price">USD {{$value->price_discount}}</span>
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
                            <script >
                                // khởi chạy slide cho trang home
                                $('#list_tour{{$key}}').slick({
                                    dots: false,
                                    infinite: false,
                                    speed: 300,
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                                    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
                                    responsive: [
                                    {
                                        breakpoint: 1600,
                                        settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 3,
                                        }
                                    },
                                    {
                                        breakpoint: 769,
                                        settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 2
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                        }
                                    }
                                    ]
                                });
                            </script>
                        @endforeach
                    @endif
                  </div>
            </div>
        </div>
    </div>
</section>

<section class="banner home home_section_b mt-5">
    <div class="boxbanner">
        <x-banner :banner="$banner_home_section"></x-banner>
    </div>
</section>

{{-- <section class="post style1 mt-5">
    <div class="container">
        <div class="row">
            <div class="list-item">
                <article class="item">
                        <div class="img">
                            <img src="https://media-server.clubmed.com/image/_AUTOFORMAT_/600/187/crop/center/75/https%3A%2F%2Fns.clubmed.com%2Fesap%2F2023%2Fregional%2FIMG%2FPHUC_K122_112.jpg" alt="">
                        </div>
                        <div class="box_des">
                            <div class="title">
                                <h3>Kids under 4 stay FREE</h3>
                                <a class="description">Special rates between 4 & 17 <i class="fal fa-long-arrow-right"></i>​</a>
                            </div>
                        </div>
                </article>
                <article class="item">
                    <div class="img">
                        <img src="https://media-server.clubmed.com/image/_AUTOFORMAT_/600/187/crop/center/75/https%3A%2F%2Fns.clubmed.com%2Fesap%2F2023%2Fregional%2FIMG%2FLROC_G122_001.jpg" alt="">
                    </div>
                    <div class="box_des">
                        <div class="title">
                            <h3>Book now, pay later</h3>
                            <a class="description">Secure your next holiday <i class="fal fa-long-arrow-right"></i>​</a>
                        </div>
                    </div>
            </article>
            <article class="item">
                <div class="img">
                    <img src="https://media-server.clubmed.com/image/_AUTOFORMAT_/600/187/crop/center/75/https%3A%2F%2Fns.clubmed.com%2Fesap%2F2023%2Fregional%2FIMG%2FMPEC_EC_A120_002.jpg" alt="">
                </div>
                <div class="box_des">
                    <div class="title">
                        <h3>Receive news & latest promotions</h3>
                        <a class="description">Newsletter sign up <i class="fal fa-long-arrow-right"></i>​</a>
                    </div>
                </div>
        </article>
            </div>
        </div>
    </div>
</section> --}}

<section class="quotation">
    <div class="container">
        <div class="row">
            <div class="boxquotation">
                <div class="dau dau1">
                    <svg viewBox="0 0 500 500" aria-hidden="true" class="absolute fill-current h-full inset-0 w-full" focusable="false"><path d="M0,324.910944 C0,295.851428 4.02356491,267.686474 12.0708155,240.415236 C20.118066,213.143998 33.194652,187.884952 51.3009657,164.637339 C69.4072794,141.389726 92.766309,120.489542 121.378755,101.936159 C149.991202,83.3827756 184.638566,68.0708758 225.321888,56 L225.321888,113.671674 C180.167872,127.977897 147.085227,145.413345 126.072961,165.978541 C105.060696,186.543737 94.554721,210.238063 94.554721,237.062232 C94.554721,246.003621 97.0135663,253.491923 101.93133,259.527361 C106.849095,265.562798 113.107973,270.927552 120.708155,275.621781 C128.308336,280.316011 136.355465,284.898404 144.849785,289.369099 C153.344105,293.839793 161.391235,299.204547 168.991416,305.463519 C176.591597,311.722492 182.850476,319.434325 187.76824,328.599249 C192.686005,337.764173 195.14485,349.276039 195.14485,363.135193 C195.14485,389.512292 186.538891,409.630117 169.326717,423.48927 C152.114542,437.348424 130.767295,444.277897 105.284335,444.277897 C91.4251811,444.277897 78.1250637,441.707286 65.3835837,436.565987 C52.6421037,431.424688 41.3537688,423.824621 31.5182403,413.765558 C21.6827119,403.706495 13.9708792,391.188737 8.38251073,376.21191 C2.7941423,361.235082 0,344.134932 0,324.910944 Z M274.678112,324.910944 C274.678112,295.851428 278.701677,267.686474 286.748927,240.415236 C294.796178,213.143998 307.872764,187.884952 325.979077,164.637339 C344.085391,141.389726 367.444421,120.489542 396.056867,101.936159 C424.669313,83.3827756 459.316678,68.0708758 500,56 L500,113.671674 C454.845983,127.977897 421.763338,145.413345 400.751073,165.978541 C379.738808,186.543737 369.232833,210.238063 369.232833,237.062232 C369.232833,246.003621 371.691678,253.491923 376.609442,259.527361 C381.527206,265.562798 387.786085,270.927552 395.386266,275.621781 C402.986447,280.316011 411.033577,284.898404 419.527897,289.369099 C428.022217,293.839793 436.069347,299.204547 443.669528,305.463519 C451.269709,311.722492 457.528588,319.434325 462.446352,328.599249 C467.364116,337.764173 469.822961,349.276039 469.822961,363.135193 C469.822961,389.512292 461.217003,409.630117 444.004828,423.48927 C426.792654,437.348424 405.445406,444.277897 379.962446,444.277897 C366.103293,444.277897 352.803175,441.707286 340.061695,436.565987 C327.320215,431.424688 316.03188,423.824621 306.196352,413.765558 C296.360823,403.706495 288.648991,391.188737 283.060622,376.21191 C277.472254,361.235082 274.678112,344.134932 274.678112,324.910944 Z"></path></svg>
                </div>
                <div class="content">
                    <p>“{{__('We stayed in Sunrise overwater villa. very Spacious and great balcony with private pool...')}}”</p>
                    <div class="info">
                        <div class="info1">
                            <img src="https://www.tripadvisor.fr/img/cdsi/img2/ratings/traveler/5.0-24206-5.svg" alt="">
                        </div>
                        <div class="info1">
                            <span>{{__('By SharathVenugopal on September 2022')}}</span>
                        </div>
                        <div class="info1">
                            <a href="#">{{__('See more comments')}}</a>
                        </div>
                    </div>
                </div>
                <div class="dau dau2">
                    <svg viewBox="0 0 500 500" aria-hidden="true" class="absolute fill-current h-full inset-0 w-full" focusable="false"><path d="M0,324.910944 C0,295.851428 4.02356491,267.686474 12.0708155,240.415236 C20.118066,213.143998 33.194652,187.884952 51.3009657,164.637339 C69.4072794,141.389726 92.766309,120.489542 121.378755,101.936159 C149.991202,83.3827756 184.638566,68.0708758 225.321888,56 L225.321888,113.671674 C180.167872,127.977897 147.085227,145.413345 126.072961,165.978541 C105.060696,186.543737 94.554721,210.238063 94.554721,237.062232 C94.554721,246.003621 97.0135663,253.491923 101.93133,259.527361 C106.849095,265.562798 113.107973,270.927552 120.708155,275.621781 C128.308336,280.316011 136.355465,284.898404 144.849785,289.369099 C153.344105,293.839793 161.391235,299.204547 168.991416,305.463519 C176.591597,311.722492 182.850476,319.434325 187.76824,328.599249 C192.686005,337.764173 195.14485,349.276039 195.14485,363.135193 C195.14485,389.512292 186.538891,409.630117 169.326717,423.48927 C152.114542,437.348424 130.767295,444.277897 105.284335,444.277897 C91.4251811,444.277897 78.1250637,441.707286 65.3835837,436.565987 C52.6421037,431.424688 41.3537688,423.824621 31.5182403,413.765558 C21.6827119,403.706495 13.9708792,391.188737 8.38251073,376.21191 C2.7941423,361.235082 0,344.134932 0,324.910944 Z M274.678112,324.910944 C274.678112,295.851428 278.701677,267.686474 286.748927,240.415236 C294.796178,213.143998 307.872764,187.884952 325.979077,164.637339 C344.085391,141.389726 367.444421,120.489542 396.056867,101.936159 C424.669313,83.3827756 459.316678,68.0708758 500,56 L500,113.671674 C454.845983,127.977897 421.763338,145.413345 400.751073,165.978541 C379.738808,186.543737 369.232833,210.238063 369.232833,237.062232 C369.232833,246.003621 371.691678,253.491923 376.609442,259.527361 C381.527206,265.562798 387.786085,270.927552 395.386266,275.621781 C402.986447,280.316011 411.033577,284.898404 419.527897,289.369099 C428.022217,293.839793 436.069347,299.204547 443.669528,305.463519 C451.269709,311.722492 457.528588,319.434325 462.446352,328.599249 C467.364116,337.764173 469.822961,349.276039 469.822961,363.135193 C469.822961,389.512292 461.217003,409.630117 444.004828,423.48927 C426.792654,437.348424 405.445406,444.277897 379.962446,444.277897 C366.103293,444.277897 352.803175,441.707286 340.061695,436.565987 C327.320215,431.424688 316.03188,423.824621 306.196352,413.765558 C296.360823,403.706495 288.648991,391.188737 283.060622,376.21191 C277.472254,361.235082 274.678112,344.134932 274.678112,324.910944 Z"></path></svg>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="holiday">
    <div class="container">
        <div class="row">
            <div class="headtitle">
                <div class="title">
                    <h3>{{ __('Holiday inspirations') }}</h3>
                </div>
            </div>
            <div class="list-item">
                @if (count($data['blogs_holiday']))
                    @foreach ($data['blogs_holiday'] as $item)
                        <article class="item">
                            <a href="{{asset('blog/'.$item->slug.'/'.$language)}}">
                                <div class="img">
                                    <img class="lazy" data-src="{{asset('uploads/'.$item->image)}}" alt="{{$item->title}}">
                                </div>
                                <div class="title">
                                    <h3>{{$item->title}}</h3>
                                </div>
                            </a>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

