@extends('site.layout')
@section('content')


@if ($bannerHead != null)
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-9" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-anchor-placement="top-bottom">
                    <a href="<?php $bannerHead->url_direction != null ? $bannerHead->url_direction : '#';?>">
                        <img src="{{asset('uploads/'.$bannerHead->image)}}" alt="{{$bannerHead->title}}">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="intro_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="img">
                    @if ($bannerSection1 != null)
                        <a href="<?php $bannerSection1->url_direction != null ? $bannerSection1->url_direction : '#';?>">
                            <img src="{{asset('uploads/'.$bannerSection1->image)}}" alt="{{$bannerSection1->title}}">
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
                @php
                    $titlene = \App\Models\Config::getByKey('HOME_TITLE_SECTION');
                    $descne = \App\Models\Config::getByKey('HOME_DESCRIPTION_SECTION');
                @endphp
                <h3><?=$titlene->value??''?></h3>
                <p><?=$descne->value??''?></p>
            </div>
        </div>
    </div>
</section>

<section class="banner_home">
    <div class="banner_home">
        @if ($bannerSection2 != null)
            <a href="<?php $bannerSection2->url_direction != null ? $bannerSection2->url_direction : '#';?>">
                <img src="{{asset('uploads/'.$bannerSection2->image)}}" alt="{{$bannerSection2->title}}" class="lazy">
            </a>
        @endif
    </div>
</section>

<section class="intro_3">
    <div class="container">
        <div class="row">
            <div class="col-lg12 col-md12 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                @php
                    $quote1 = \App\Models\Config::getByKey('HOME_QUOTE_1');
                @endphp
                <h3><?=$quote1->value??''?></h3>
                <p>— GUSTAV</p>
            </div>
        </div>
    </div>
</section>

<section class="banner_home banner2">
    <div class="banner_home">
        @if ($bannerSection3 != null)
            <a href="<?php $bannerSection3->url_direction != null ? $bannerSection3->url_direction : '#';?>">
                <img src="{{asset('uploads/'.$bannerSection3->image)}}" alt="{{$bannerSection3->title}}" class="lazy">
            </a>
        @endif
    </div>
</section>

<section class="intro_3">
    <div class="container">
        <div class="row">
            <div class="col-lg12 col-md12 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                @php
                    $quote2 = \App\Models\Config::getByKey('HOME_QUOTE_2');
                @endphp
                <h3><?=$quote2->value??''?></h3>
                <p>— GUSTAV</p>
            </div>
        </div>
    </div>
</section>
<style>
    .boxgap{
        display: none;
    }
</style>

@endsection

