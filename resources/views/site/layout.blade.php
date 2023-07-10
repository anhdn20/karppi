<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Clubmed</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href="{{asset('uploads/')}}"/> --}}
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  </head>
  <body>
    @php
        $language = Session::get('website_language', config('app.locale'));
    @endphp
    @if ($language == 'en')
        <style>
            @font-face {
                font-family: font_kieu;
                src: url('{{asset("assets/fonts/font1.woff2")}}');
            }

            @font-face {
                font-family: font_thuong;
                src: url('{{asset("assets/fonts/font2.woff2")}}');
            }
        </style>
    @else
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Josefin Sans', sans-serif;
            }
        </style>
    @endif
    <header>
        <div class="top_bar">
            <div class="box_text">
                <marquee direction="right">The most popular tourist destinations</marquee>
            </div>
        </div>

        <div class="header nav-top">
            {{-- menu mobile --}}

            <div class="logo">
                <span class="hamburger" id="ham"><i style="color: #000;" class="fal fa-bars"></i></span>
                <nav class="nav-drill">
                    <ul class="nav-items nav-level-1">
                        @php
                            use App\Models\Category;
                        @endphp
                        @foreach ($data['categories'] as $value)
                            @php
                                $cate2 = Category::getAllTour($language,$value->id);
                            @endphp
                            <li class="nav-item <?php if(count($cate2) > 0) echo 'nav-expand';?>">
                                {{-- {{asset('/tour/'.$value->slug)}} --}}
                                <a class="nav-link nav-expand-link" href="javascript:(0)">{{$value->title}}</a>
                                <ul class="nav-items nav-expand-content">

                                    @foreach ($cate2 as $item)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{asset('/tours/'.$item->slug.'/'.$language)}}">{{$item->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        {{-- <li class="nav-item nav-expand">
                            <a class="nav-link nav-expand-link" href="#">
                                Menu 1
                            </a>
                            <ul class="nav-items nav-expand-content">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Level 2
                                    </a>
                                </li>
                                <li class="nav-item nav-expand">
                                    <a class="nav-link nav-expand-link" href="#">
                                        Menu 2
                                    </a>
                                    <ul class="nav-items nav-expand-content">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Level 3
                                            </a>
                                        </li>
                                        <li class="nav-item nav-expand">
                                            <a class="nav-link nav-expand-link" href="#">
                                                Menu
                                            </a>
                                            <ul class="nav-items nav-expand-content">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Level 4
                                                    </a>
                                                </li>
                                                <li class="nav-item nav-expand">
                                                    <a class="nav-link nav-expand-link" href="#">
                                                        Menu
                                                    </a>
                                                    <ul class="nav-items nav-expand-content">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">
                                                                Level 5 Directory
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">
                                                                Level 5 Contact
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">
                                                                Level 5 Quick links
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#">
                                                                Level 5 Launchpad
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Level 4 Directory
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Level 4 Contact
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Level 4 Quick links
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Level 4 Launchpad
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Level 3 Directory
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Level 3 Contact
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Level 3 Quick links
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Level 3 Launchpad
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Level 2 Directory
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Level 2 Contact
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Level 2 Quick links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Level 2 Launchpad
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/review/'.$language.'')}}">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/blogs/'.$language.'')}}">{{__('Blog')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/contact-us/'.$language.'')}}">{{__('About us')}}</a>
                        </li>
                    </ul>
                </nav>
                <a href="{{asset('/')}}">
                    <svg viewBox="0 0 500 93" aria-hidden="true" class="absolute fill-current h-full inset-0 w-full" focusable="false"><path d="M500 72l-9.6-9.6-9.6 9.6 9.6 9.6L500 72zm-3.9-69.2c-.5-2.3-5.7 1-16.6 10.9 4.4 4.9 6.5 2.1 10.1.8 2.8 5.4 3.9 29.8-14.5 37 .5-24.6.8-50.8.8-50.8 0-.8-.5-.8-1-.8-4.9.8-14 9.6-21 17.1 3.9 6.2 8.5.5 12.4-1 0 1-.8 19.2-.5 37.6-18.9 1.6-15.8-37.5-14.8-42.5.5-4.1-12.2 4.9-18.4 10.6 2.1 3.6 4.7 2.8 8.3 1.6-1.3 17.4 10.9 33.4 25.1 32.9.5 17.9 2.3 35.5 7.5 36.8.8.3 1.3-18.1 1.6-38.6 34-10.6 21-51.6 21-51.6zM80.8 66.1V14.8H67.4v51.8c0 11.1 5.4 17.1 18.4 17.1H94v-9.8h-5.4c-5.7-.1-7.8-1.9-7.8-7.8zm201.6-50.6l-19.7 52.1L243 15.5h-19.2v68.1h13.5V43c0-2.6 0-7-.3-9.8h.5l18.9 50.5h12.4L288 33.2h.3c-.3 2.8-.3 7.3-.3 9.8v40.7h13.5V15.5h-19.1zm-161.9 69c16.8 0 25.1-6 25.1-22V31.6h-13.5v30.6c0 9.3-5.7 12.7-11.9 12.7s-11.9-3.4-11.9-12.7V31.6H94.8v30.8c.3 16.1 8.8 22.1 25.7 22.1zm45.6-22.3v-9.3c0-9.3 7.3-12.7 13.5-12.7s13.5 3.4 13.5 12.7v9.3c0 9.3-7.3 12.7-13.5 12.7-6.3.2-13.5-3.4-13.5-12.7zm39.6-9.1c0-12.7-7.3-22.3-24.4-22.3-5.2 0-10.6 1.3-15 3.4V14.8h-13.5v47.4c0 16.1 9.6 22 26.4 22 16.8 0 26.4-6.7 26.4-22.8.1 0 .1-8.3.1-8.3zm199.7-.3v9.3c0 9.3-7.3 12.7-13.5 12.7s-13.5-3.4-13.5-12.7v-9.3c0-9.3 7.3-12.7 13.5-12.7 6.3.1 13.5 3.7 13.5 12.7zm-15-22c-17.1 0-24.4 9.6-24.4 22.3v8.3c0 16.1 9.6 22.8 26.4 22.8 16.8 0 26.4-6 26.4-22V14.8h-13.2v19.4c-4.6-2.1-10-3.4-15.2-3.4zm-69.7 22.3c0-9.6 7.3-13.2 13.5-13.2s13.5 3.6 13.5 13.2h-27zM351 69.9c-5.7 3.9-9.8 5.2-16.3 5.2-7.8 0-14.2-4.4-14.2-12.7v-1h39.9V57c0-16.1-9.6-26.2-26.4-26.2S307.5 40.9 307.5 57v2.1c0 15.5 9.3 25.4 27.2 25.4 9.1 0 16.8-1.8 24.6-8l-8.3-6.6zM31.9 84.5c17.6 0 28.5-9.1 30.8-21.2H48.4c-2.3 8-8.3 11.9-16.8 11.9-13.2 0-18.1-8.8-18.1-22.3v-6.7c0-15 6.5-22 18.1-22 8.3 0 14.2 3.6 16.8 11.9h14.2C60 23.9 49.4 14.9 31.8 14.9 11.7 14.8 0 26.9 0 45.9v9.3c0 17.9 11.1 29.3 31.9 29.3z"></path></svg>
                </a>
            </div>
            <div class="menu">
                <ul class="main">
                    @foreach ($data['categories'] as $value)
                        <li>
                            <a href="{{asset('/tours/'.$value->slug.'/'.$language)}}">{{$value->title}}</a>
                            <ul>
                                @php
                                    $cate2 = Category::getAllTour($language,$value->id);
                                @endphp
                                @foreach ($cate2 as $item)
                                    <li>
                                        <a href="{{asset('/tours/'.$item->slug.'/'.$language)}}">{{$item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{asset('/review/'.$language.'')}}">Review</a>
                    </li>
                    <li>
                        <a href="{{asset('/blogs/'.$language.'')}}">Blog</a>
                    </li>
                    <li>
                        <a href="{{asset('/contact-us/'.$language.'')}}">{{__('About us')}}</a>
                    </li>
                </ul>
            </div>
            <div class="info">
                <div class="call">
                    <a href="tel:0123456789">
                        <svg viewBox="0 0 30 30" aria-hidden="true" class="" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.26386 4.45001L4.54078 6.17338C3.83116 6.83682 3.41718 7.7238 3.37046 8.72513C3.26955 9.9323 3.49729 11.0692 4.03786 12.5574C4.84619 14.7761 6.15479 16.9238 7.89307 19.0044C10.1192 21.6546 12.7661 23.7298 15.8534 25.2393C17.5445 26.0416 18.9645 26.4864 20.4451 26.5879C21.7747 26.673 22.9024 26.3014 23.773 25.4089L24.0334 25.1298L24.3854 24.7709L25.4752 23.6963C26.6416 22.5285 26.6416 20.9499 25.4743 19.7836L22.7051 17.0147L22.567 16.8843C21.4444 15.8839 19.914 15.9274 18.8263 17.0154L17.3919 18.4491L17.1576 18.3303L16.985 18.237L16.8544 18.1578L16.7967 18.1189C15.284 17.1783 13.9818 15.976 12.6737 14.385L12.461 14.1199C12.0509 13.5973 11.7322 13.1191 11.4903 12.6475L11.4379 12.5421L12.8782 11.134C14.0421 9.92174 14.0421 8.39753 12.8934 7.20083L10.5355 4.82741C10.4859 4.77811 10.4379 4.73096 10.391 4.6853L10.1166 4.42423C8.96156 3.31934 7.39434 3.31934 6.26386 4.45001ZM8.74497 5.87972L8.99863 6.12116L9.27794 6.39855L10.0898 7.22508L11.4648 8.60036C11.8564 9.0086 11.8564 9.31067 11.4505 9.73348L9.75188 11.3971L9.82283 11.3355C9.29705 11.7582 9.19164 12.3532 9.41818 12.9236C9.79761 13.8535 10.3494 14.7037 11.1277 15.6538C12.5666 17.4039 14.0263 18.7515 15.6966 19.7883L15.8455 19.8874L16.0155 19.9875L16.2276 20.1012L16.8593 20.4245C17.4985 20.7461 18.0545 20.6138 18.5164 20.154L20.2406 18.4294C20.5926 18.0774 20.9394 18.0774 21.2914 18.4294L24.0603 21.1981C24.4464 21.5838 24.4464 21.8962 24.06 22.283L23.1149 23.2137L22.6952 23.6368L22.4505 23.8936C21.9731 24.4383 21.3977 24.6448 20.5774 24.5923C19.3901 24.5109 18.1949 24.1365 16.7212 23.4374C13.8964 22.0562 11.4716 20.1551 9.42619 17.7201C7.82924 15.8086 6.63968 13.8563 5.91736 11.8736C5.4669 10.6335 5.29109 9.75588 5.36595 8.8545C5.39058 8.34047 5.57613 7.94293 5.9318 7.61002L7.6782 5.8641C8.0328 5.50943 8.35783 5.50943 8.74497 5.87972Z"></path></svg>
                        <span>0123456789</span>
                    </a>
                </div>
                <div class="search" >
                    <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <svg viewBox="0 0 30 30" aria-hidden="true" class="" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.601 12.817C20.601 14.899 19.816 16.804 18.332 18.327C16.898 19.797 14.942 20.607 12.824 20.607C10.747 20.607 8.844 19.82 7.324 18.333C4.305 15.31 4.303 10.363 7.318 7.306C8.785 5.837 10.741 5.028 12.824 5.028C14.902 5.028 16.804 5.814 18.325 7.302C19.793 8.737 20.601 10.696 20.601 12.817M26.693 25.285L20.408 18.989L20.6 18.739C23.577 14.861 23.198 9.333 19.718 5.881C17.863 4.023 15.402 3 12.791 3C10.179 3 7.719 4.022 5.865 5.88C2.045 9.705 2.045 15.93 5.865 19.755C7.719 21.612 10.179 22.635 12.791 22.635C14.974 22.635 17.017 21.945 18.701 20.64L18.95 20.447L25.27 26.708C25.465 26.903 25.732 27 26 27C26.267 27 26.534 26.903 26.728 26.71C27.104 26.332 27.088 25.68 26.693 25.285"></path></svg>
                    </a>
                </div>
                <div class="language">
                    <a href="{!! route('user.change-language', ['en']) !!}">En</a> |
                    <a href="{!! route('user.change-language', ['vi']) !!}">Vi</a>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="search_form two hehe">
                    <form action="{{ route('search-key') }}" method="POST">
                        @csrf
                        <div class="boxform">
                            <div class="icon">
                                <i class="far fa-search"></i>
                            </div>
                            <input type="text" name="" id="search-input1" placeholder="{{__('Looking for stay ..')}}">
                        </div>
                        <div class="button_search">
                            <svg viewBox="0 0 30 30" aria-hidden="true" class="" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.601 12.817C20.601 14.899 19.816 16.804 18.332 18.327C16.898 19.797 14.942 20.607 12.824 20.607C10.747 20.607 8.844 19.82 7.324 18.333C4.305 15.31 4.303 10.363 7.318 7.306C8.785 5.837 10.741 5.028 12.824 5.028C14.902 5.028 16.804 5.814 18.325 7.302C19.793 8.737 20.601 10.696 20.601 12.817M26.693 25.285L20.408 18.989L20.6 18.739C23.577 14.861 23.198 9.333 19.718 5.881C17.863 4.023 15.402 3 12.791 3C10.179 3 7.719 4.022 5.865 5.88C2.045 9.705 2.045 15.93 5.865 19.755C7.719 21.612 10.179 22.635 12.791 22.635C14.974 22.635 17.017 21.945 18.701 20.64L18.95 20.447L25.27 26.708C25.465 26.903 25.732 27 26 27C26.267 27 26.534 26.903 26.728 26.71C27.104 26.332 27.088 25.68 26.693 25.285"></path></svg>
                        </div>
                    </form>
                    <div id="search_results1" class="hehe"></div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="logo">
                        <a href="{{asset('/')}}">
                            <svg viewBox="0 0 500 93" aria-hidden="true" class="absolute fill-current h-full inset-0 w-full" focusable="false"><path d="M500 72l-9.6-9.6-9.6 9.6 9.6 9.6L500 72zm-3.9-69.2c-.5-2.3-5.7 1-16.6 10.9 4.4 4.9 6.5 2.1 10.1.8 2.8 5.4 3.9 29.8-14.5 37 .5-24.6.8-50.8.8-50.8 0-.8-.5-.8-1-.8-4.9.8-14 9.6-21 17.1 3.9 6.2 8.5.5 12.4-1 0 1-.8 19.2-.5 37.6-18.9 1.6-15.8-37.5-14.8-42.5.5-4.1-12.2 4.9-18.4 10.6 2.1 3.6 4.7 2.8 8.3 1.6-1.3 17.4 10.9 33.4 25.1 32.9.5 17.9 2.3 35.5 7.5 36.8.8.3 1.3-18.1 1.6-38.6 34-10.6 21-51.6 21-51.6zM80.8 66.1V14.8H67.4v51.8c0 11.1 5.4 17.1 18.4 17.1H94v-9.8h-5.4c-5.7-.1-7.8-1.9-7.8-7.8zm201.6-50.6l-19.7 52.1L243 15.5h-19.2v68.1h13.5V43c0-2.6 0-7-.3-9.8h.5l18.9 50.5h12.4L288 33.2h.3c-.3 2.8-.3 7.3-.3 9.8v40.7h13.5V15.5h-19.1zm-161.9 69c16.8 0 25.1-6 25.1-22V31.6h-13.5v30.6c0 9.3-5.7 12.7-11.9 12.7s-11.9-3.4-11.9-12.7V31.6H94.8v30.8c.3 16.1 8.8 22.1 25.7 22.1zm45.6-22.3v-9.3c0-9.3 7.3-12.7 13.5-12.7s13.5 3.4 13.5 12.7v9.3c0 9.3-7.3 12.7-13.5 12.7-6.3.2-13.5-3.4-13.5-12.7zm39.6-9.1c0-12.7-7.3-22.3-24.4-22.3-5.2 0-10.6 1.3-15 3.4V14.8h-13.5v47.4c0 16.1 9.6 22 26.4 22 16.8 0 26.4-6.7 26.4-22.8.1 0 .1-8.3.1-8.3zm199.7-.3v9.3c0 9.3-7.3 12.7-13.5 12.7s-13.5-3.4-13.5-12.7v-9.3c0-9.3 7.3-12.7 13.5-12.7 6.3.1 13.5 3.7 13.5 12.7zm-15-22c-17.1 0-24.4 9.6-24.4 22.3v8.3c0 16.1 9.6 22.8 26.4 22.8 16.8 0 26.4-6 26.4-22V14.8h-13.2v19.4c-4.6-2.1-10-3.4-15.2-3.4zm-69.7 22.3c0-9.6 7.3-13.2 13.5-13.2s13.5 3.6 13.5 13.2h-27zM351 69.9c-5.7 3.9-9.8 5.2-16.3 5.2-7.8 0-14.2-4.4-14.2-12.7v-1h39.9V57c0-16.1-9.6-26.2-26.4-26.2S307.5 40.9 307.5 57v2.1c0 15.5 9.3 25.4 27.2 25.4 9.1 0 16.8-1.8 24.6-8l-8.3-6.6zM31.9 84.5c17.6 0 28.5-9.1 30.8-21.2H48.4c-2.3 8-8.3 11.9-16.8 11.9-13.2 0-18.1-8.8-18.1-22.3v-6.7c0-15 6.5-22 18.1-22 8.3 0 14.2 3.6 16.8 11.9h14.2C60 23.9 49.4 14.9 31.8 14.9 11.7 14.8 0 26.9 0 45.9v9.3c0 17.9 11.1 29.3 31.9 29.3z"></path></svg>
                        </a>
                    </div>
                    <p>{{__('We always listen to comments from customers to improve, and have preferential policies for customers who often use the tour service.')}}</p>
                    <p style="font-weight: bold">{{__('Contact')}}: <span>+84 98 398 3966</span></p>
                    <p style="font-weight: bold">Email: <span>clubmed@gmail.com</span></p>
                    <p style="font-weight: bold">{{__('Address')}}: <span>B12 Phú Thuận, P. Phú Thuận, Q.7, TP.HCM</span></p>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="title">
                        <h3>{{__('Service')}}</h3>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="#">{{__('Room service')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('Food Service')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('Fun service')}}</a>
                            </li>
                            {{-- <li>
                                <a href="#">Responsible Tourism</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="title titleduoi">
                        <h3>{{__('Info')}}</h3>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="#">{{__('Tour Information')}}</a>
                            </li>
                            {{-- <li>
                                <a href="#">Thông tin liên hệ</a>
                            </li> --}}
                            {{-- <li>
                                <a href="#">Contact us</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="title">
                        <h3>{{__('Customer care')}}</h3>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="#">{{__('Advise')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('About')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('Book')}}</a>
                            </li>
                            {{-- <li>
                                <a href="#">About Great Members</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="title">
                        <h3>{{__('Contact')}}</h3>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Zalo</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js" integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {

            // $( ".formsearch" ).on( "mouseout", function() {
            //     $("#search-results").hide();
            // } );

            document.addEventListener('click', function(e) {
                var node = e.target;
                var inside = false;
                while (node) {
                    if (node.classList.contains('hehe')) {
                        inside = true;
                        break;
                    }
                    node = node.parentElement;
                }

                if (!inside) {
                    $('#search_results').hide();
                    $('#search_results1').hide();
                }
            });



            // Gán sự kiện keyup cho ô tìm kiếm
            $('#search-input').on('keyup', async function (e) {
                e.preventDefault();
                // Lấy giá trị ô tìm kiếm
                var searchTerm = $(this).val();
                var token = $('input[name="_token"]').val();
                var url = '{{url("/search")}}';
                // Thực hiện yêu cầu AJAX để tìm kiếm
                await $.ajax({
                    url: url,
                    type: 'POST',
                    data:  {searchTerm:searchTerm},
                    headers: {
                        "X-CSRF-TOKEN": token
                    },
                    success: function(result) {
                        // Hiển thị kết quả tìm kiếm
                        var html = '';
                        $.each(result, function(index, row) {
                            let img = '<?php echo asset('uploads/'); ?>' + '/' + row['image'];
                            let url = '<?php echo asset('tour/'); ?>' + '/' + row['slug'] + '/' + '<?php echo $language;?>';
                        html += `
                                <a href="${url}">
                                    <img src="${img}" alt="${row['title']}">
                                    <h3>
                                        ${row['title']}
                                    </h3>
                                </a>
                                `;
                        });
                        if(result.length > 0){
                            $('#search_results').show();
                            $('#search_results').html(html);
                        }else{
                            $('#search_results').show();
                            $('#search_results').html('<h3 style="font-size:18px;">Không tìm thấy kết quả nào</h3>');
                        }
                    }
                });
            });

            // Gán sự kiện keyup cho ô tìm kiếm
            $('#search-input1').on('keyup', async function (e) {
                e.preventDefault();
                // Lấy giá trị ô tìm kiếm
                var searchTerm = $(this).val();
                var token = $('input[name="_token"]').val();
                var url = '{{url("/search")}}';
                // Thực hiện yêu cầu AJAX để tìm kiếm
                await $.ajax({
                    url: url,
                    type: 'POST',
                    data:  {searchTerm:searchTerm},
                    headers: {
                        "X-CSRF-TOKEN": token
                    },
                    success: function(result) {
                        // Hiển thị kết quả tìm kiếm
                        var html = '';
                        $.each(result, function(index, row) {
                            let img = '<?php echo asset('uploads/'); ?>' + '/' + row['image'];
                            let url = '<?php echo asset('tour/'); ?>' + '/' + row['slug'] + '/' + '<?php echo $language;?>';
                        html += `
                                <a href="${url}">
                                    <img src="${img}" alt="${row['title']}">
                                    <h3>
                                        ${row['title']}
                                    </h3>
                                </a>
                                `;
                        });
                        if(result.length > 0){
                            $('#search_results1').show();
                            $('#search_results1').html(html);
                        }else{
                            $('#search_results1').show();
                            $('#search_results1').html('<h3 style="font-size:18px;">Không tìm thấy kết quả nào</h3>');
                        }
                    }
                });
            });

        });


    </script>
  </body>
</html>
