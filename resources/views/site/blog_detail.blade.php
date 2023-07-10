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
            @if ($data['detail'] != null)
                @php
                    $detail = $data['detail'];
                @endphp
                <div class="headtitle">
                    <div class="title">
                        <h3>{{ $detail->title }}</h3>
                    </div>
                </div>
                <div class="box_content">
                    {!! html_entity_decode($detail->description) !!}
                </div>
            @endif
        </div>
    </div>
</section>




@endsection

