<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Karppi</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href="{{asset('uploads/')}}"/> --}}
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>


  </head>
  <body>
    <header>
        @php
            $logo = \App\Models\Image::getAllByType('LOGO');
            $urlFb = \App\Models\Config::getByKey('URL_FACEBOOK');
            $urlInsta = \App\Models\Config::getByKey('URL_INSTAGRAM');
        @endphp
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="{{asset('/')}}">
                                <img src="{{asset('uploads/'.$logo->image)}}" alt="{{$logo->title}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <ul class="menu">
                            <li>
                                <a href="{{asset('/menu')}}">MENU</a>
                            </li>
                            <li>
                                <a href="{{asset('/gallery')}}">GALLERY</a>
                            </li>
                            <li>
                                <a href="{{asset('/about-us')}}">ABOUT US</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <ul class="social">
                            <li>
                                <a href="<?=$urlFb->value??''?>"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="<?=$urlInsta->value??''?>"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb">
            <div class="head">
                <div class="logo">
                    <a href="{{asset('/')}}">
                        <img src="{{asset('uploads/'.$logo->image)}}" alt="{{$logo->title}}">
                    </a>
                </div>
            </div>
            <input type="checkbox" id="burger-toggle" />
            <label for="burger-toggle" class="burger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </label>
            <div class="menu">
                <div class="menu-inner">
                    <ul class="menu-nav">
                        <li class="menu-nav-item">
                            <a class="menu-nav-link" href="#">
                                <span>
                                    <div>Home</div>
                                </span>
                            </a>
                        </li>
                        <li class="menu-nav-item">
                            <a class="menu-nav-link" href="{{asset('/menu')}}">
                                <span>
                                    <div>MENU</div>
                                </span>
                            </a>
                        </li>
                        <li class="menu-nav-item">
                            <a class="menu-nav-link" href="{{asset('/gallery')}}">
                                <span>
                                    <div>GALLERY</div>
                                </span>
                            </a>
                        </li>
                        <li class="menu-nav-item">
                            <a class="menu-nav-link" href="{{asset('/about-us')}}">
                                <span>
                                    <div>ABOUT US</div>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="gallery">
                        <div class="images">
                            <a href="<?=$urlFb->value??''?>" class="image-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?=$urlInsta->value??''?>" class="image-link"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    @yield('content')

    {{-- nút booking table --}}


    <a href="#" class="btnbook">Book a table</a>


    <div class="boxgap">

    </div>
    <footer>
        @php
            $address = \App\Models\Config::getByKey('ADDRESS');
            $urlMap = \App\Models\Config::getByKey('URL_REDIRECT_MAP');
            $email = \App\Models\Config::getByKey('EMAIL');
            $phone = \App\Models\Config::getByKey('PHONE');
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-lg-4 welcome">
                    <div class="top">
                        <h3>WELCOME!</h3>
                        <a href="<?=$urlMap->value??'3'?>" target="blank"><?=$address->value??''?></a>
                    </div>
                    <div class="bottom">
                        <h3>FOOD</h3>
                       <p>LUNCH 11-14 / TERRACE MENU 14-CARTE MENU 16-</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>AUKIOLO / HOURS</h3>
                    <p>MON 11-22 (KITCHEN -21:30)</p>
                    <p>TUE 11-23 (KITCHEN -21:30)</p>
                    <p>WED 11-23 (KITCHEN -21:30)</p>
                    <p>THU 11-23 (KITCHEN -21:30)</p>
                    <p>FRI 11-24 (KITCHEN -22:30)</p>
                    <p>SAT 12-24 (KITCHEN -22:30)</p>
                    <p>SUN CLOSED</p>
                </div>
                <div class="col-lg-4">
                    <h3>YHTEYS / CONTACT</h3>
                    <p><?=$email->value??''?> <br>
                        <?=$phone->value??''?></p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js" integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>
