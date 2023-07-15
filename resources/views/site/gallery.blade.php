@extends('site.layout')
@section('content')

<section class="review mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="img gallery_all">
                    @foreach ($gallery as $item)
                        @if ($item->type == 'VIDEO')
                            <a href="{{asset('uploads/'.$item->url)}}" data-fancybox="gallery1">
                                <img class="lazy" src="{{asset('uploads/'.$item->image)}}" alt="">
                            </a>
                        @else
                            <a href="{{asset('uploads/'.$item->image)}}" data-fancybox="gallery1">
                                <img class="lazy" src="{{asset('uploads/'.$item->image)}}" alt="">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    @media (min-width: 1400px){
        .container{
            max-width: 1700px;
        }
    }
</style>
<script>
    $(document).ready(function () {
        // $(".gallery_all").justifiedGallery({
        //     rowHeight: 400,
        //     margins : 50
        // });
        // init Masonry
        var gutterT = 100;
        if(screen.width <= 1024){
            gutterT = 50;
        }
        if(screen.width <= 768){
            gutterT = 10;
        }

        var $grid = $('.gallery_all').imagesLoaded( function() {
        // init Masonry after all images have loaded
            $grid.masonry({
                gutter: gutterT
            });
        });

    });
</script>
@endsection

