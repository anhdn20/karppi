@extends('site.layout')
@section('content')

<section class="banner home home_section_b">
    <div class="boxbanner">
        <x-banner :banner="$data['banner_review']"></x-banner>
    </div>
</section>

<section class="review mt-5">
    <div class="container">
        <div class="row">
            <div class="boxtab">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    @if (!empty($data['reviews']))
                        @foreach ($data['reviews'] as $key => $item)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $key == 0 ? "active" : "" }}" id="pills-review_{{$key}}_0" data-bs-toggle="pill" data-bs-target="#pills-review_{{$key}}" type="button" role="tab" aria-controls="pills-review_{{$key}}" aria-selected="true">{{$item->title}}</button>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @if (!empty($data['reviews']))
                        @foreach ($data['reviews'] as $key => $item)
                            <div class="tab-pane fade {{ $key == 0 ? "show active" : "" }}" id="pills-review_{{$key}}" role="tabpanel" aria-labelledby="pills-review_{{$key}}">
                                <div class="box_gallery">
                                    <div class="review">
                                        <p>{!! html_entity_decode($item->description) !!}</p>
                                    </div>
                                    @php
                                        // chạy for để lấy danh sách bài viết
                                        $reviewGallery = \App\Models\reviewGallery::where('id_review',$item->id)->get();
                                        // dd(count($reviewGallery->toArray()));
                                    @endphp
                                    @if (count($reviewGallery->toArray()) > 0)
                                        <div class="img gallery_all">
                                            @foreach ($reviewGallery as $key1 => $value)
                                                <a href="{{asset('uploads/'.$value->path)}}" data-fancybox="gallery{{$key1}}">
                                                    <img src="{{asset('uploads/'.$value->path)}}" alt="{{$item->title}}">
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(".gallery_all").justifiedGallery({
            rowHeight: 280
        });
    });
</script>
@endsection

