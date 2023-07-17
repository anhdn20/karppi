@extends('site.layout')
@section('content')
@php
    $address = \App\Models\Config::getByKey('ADDRESS');
    $iframe = \App\Models\Config::getByKey('IFRAME_MAP');
    $res = \App\Models\Config::getByKey('RESTAURANT');
    $phone = \App\Models\Config::getByKey('PHONE');
@endphp
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>RESTAURANT</h3>
                <p class="desc">
                    <?=$res->value??''?>
                </p>
                <h3>PHONE</h3>
                <p class="desc">
                    <?=$phone->value??''?>
                </p>
                <h3>ADDRESS</h3>
                <p class="desc">
                    <?=$address->value??''?>
                </p>
            </div>
            <div class="col-lg-12">
                <div class="map">
                    <?=$iframe->value??''?>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

