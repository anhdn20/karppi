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
                <h3>GUSTAV, THE WANDERER</h3>
                <p>Mr. Gustav is a gentle grandfather, whose beard tickles as he hugs. He never says no for angling with his grandchildren and encourages them for yet another pancake. Gustav had a soul of a wanderer already way before travelling became somewhat fashionable. His voyages have made him quite a storyteller, and from the travels he always returned with a chest full of recipes. The passing days have not faded Gustav’s curiosity for globetrotting, even if made him more composed. A delightful drink, scrumptious food and beloved people around are what truly matters to Gustav. Therefore, he joyfully puts great effort into creating delicacies to his pals, generated with decades of uncompromising experience.</p>
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
                <h3>“FOOD PREPARED WITH SIMPLE BUT HIGH-QUALITY INGREDIENTS IS FASHIONABLE, ALWAYS AND EVERYWHERE. THAT’S WHAT I LEARNT DURING MY JOURNEYS.”</h3>
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
                <h3>“THE TRUE VIRTUE OF COOKING IS CURIOUSITY.”</h3>
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

