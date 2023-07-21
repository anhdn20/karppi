@extends('site.layout')
@section('content')

@if ($currentMenu != null)
    @php
        $image = asset('uploads/'.$currentMenu->image_url??'');
    @endphp

    <style>
        section.banner .banner::before{
            background-image: url('<?php echo $image; ?>');
        }
    </style>
    <section class="menuno13">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>{{$currentMenu->name}}</h2>
                    <p class="description">{!! html_entity_decode($currentMenu->intro) !!}</p>
                    {{-- <span class="owner">- GUSTAV</span> --}}
                </div>
            </div>
        </div>
    </section>
@endif

<section class="banner">
    <div class="banner">
    </div>
</section>

<section class="recommendfood">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                {!! html_entity_decode($currentMenu->description) !!}
                {{-- <h3>KNUT BREAD BAKED FROM GUSTAV’S SOURDOUGH</h3>
                <p class="desc">
                    The Knut bread is named after Gustav’s grandfather and refers to a hot dish following the original recipe. Knut believed that great bread (and moustaches) makes a man. This sourdough Knut reminds Gustav of childhood moments spent with his grandfather. Way back then, the table was always set with fresh bread and toasted butter, which was one of grandfather’s special culinary delights. This speciality was actually created by accident, as a saucepan with butter was left on the stove for a little too long. The same favourable forgetfulness runs in Gustav’s genes and is evident in his cuisine.
                </p>
                <h3>TO ACCOMPANY THE BREAD</h3>
                <p class="desc">Wild garlic cream cheese (LF,GF)  5€</p>
                <p>Feta spread (LF,GF) 6€</p>
                <p>Chicken liver mousse and pear and port wine jam (LF,GF) 8€</p>
                <p>Cold cuts from southern Europe (MF,GF) 11€</p>
                <p>Selection of cheeses with compote of the day (GF)  11€</p> --}}
            </div>
        </div>
    </div>
</section>

@foreach ($categoryByCurrentMenu as $item)
    <section class="menubycate">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-9 col-sm-12">
                    <h3 class="title_cate">{{$item->name}}</h3>
                    <p class="desc">
                        {{-- “Simple and delicious food made with good ingredients is something that is topical always and everywhere. This is one of the things I have learned on my journeys.” --}}
                        {{$item->description}}
                    </p>
                    <span class="owner">— Gustav</span>
                    {{-- load món ăn theo danh mục --}}
                    @php
                        $meals = \App\Models\Food::where('category_id',$item->id)->get();
                    @endphp
                    @foreach ($meals as $food)
                        <div class="meal">
                            <h3 class="title">{{$food->name}}</h3>
                            <p>{{$food->description}}</p>
                            <span class="price">
                                {{$food->price}} €
                            </span>
                        </div>
                    @endforeach
                    {{-- <div class="meal">
                        <h3 class="title">GAZPACHO</h3>
                        <p>Once enjoying the throaty rumble of his motorbike as he rode through Spain, Gustav’s heart is always warmed when hearting the word ‘gazpacho’. Gazpacho, the elixir of wayfarers and adventurers traversing dusty paths, embodies simplicity, purity, and sheer perfection on a scorching summer's day. In Gustav's summer menu, this chilled tomato and bell pepper soup is served with a side of cucumber and celery salad and chive sour cream dressing. Salud!  (LF, GF)</p>
                        <span class="price">
                            14 €
                        </span>
                    </div>
                    <div class="meal">
                        <h3 class="title">BURRATA</h3>
                        <p>Gustav learnt how to prepare the mozzarella burrata on one of his many trips to Italy. This creamy and flavoursome delight is handsomely accompanied by capers, lovingly marinated fennel, a generous splash of olive oil, aioili, and a sun-kissed, grilled salad.   (LF,GF)</p>
                        <span class="price">
                            15 €
                        </span>
                    </div>
                    <div class="meal">
                        <h3 class="title">STEAK TARTARE</h3>
                        <p>When Gustav decided to enhance the classic tartare with perfectly tangy pickled pear, crunchy peanuts, and a touch of sweet chili, he was reminded once again why curiosity is the highest virtue of culinary art.  (LF,GF)</p>
                        <span class="price">
                            16 €
                        </span>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endforeach

{{-- <section class="menubycate">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <h3 class="title_cate">HOT</h3>
                <p class="desc">
                    “My favourite recipe infatuates me over and over again! It reminds me of my once-in-a-lifetime experiences and the homely feeling of the rootlessness world traveller.”
                </p>
                <span class="owner">— Gustav</span>
                <div class="meal">
                    <h3 class="title">LEMON & PEA RISOTTO</h3>
                    <p>This verdant risotto, gracing the summer menu, holds a cherished place among Gustav's culinary delights, transcending the constraints of time and location. It evokes vivid recollections of a journey through the sun-soaked landscapes of Calabria, Italy, where Gustav witnessed the enchantment of asparagus gracefully added to risotto, punctuated by a delicate sprinkle of hazelnuts. As a memento from that journey, he discovered that risotto epitomised an unpretentious yet precise culinary craft.  (LF, GF, available as VEG)</p>
                    <span class="price">
                        15 €
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">AUBERGINE</h3>
                    <p>Our host finds inspiration in crafting a delectable vegetarian masterpiece, wherein the captivating aubergine claims the spotlight. As the grill is fired up, the rhythmic dance of culinary artistry begins, delicately adorning the plate with a touch of Japan's cherished gift, miso, accompanied by a tangy pickled salad and the luscious embrace of sesame-infused mayonnaise. (LF, GF available as VEG)</p>
                    <span class="price">
                        15 €
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">PAN-FRIED PIKE-PERCH</h3>
                    <p>Gustav holds the belief that this nourishing and delectable pan-fried pike-perch evokes a sense of enchantment, particularly on a warm summer’s day. As he hums away in the kitchen, Gustav gracefully adds new potatoes and asparagus into the culinary symphony. Gracefully enhancing the ensemble is a velvety hollandaise sauce infused with the essence of yuzu fruit.  (LF,GF)</p>
                    <span class="price">
                        17 €
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">ENTRECÔTE</h3>
                    <p>Grilling, like life itself, is a skill honed with care and mastery. Endowed with the wisdom bestowed by an Argentinian barbecue chef, Gustav gracefully assembles the pinnacle of summer’s meaty delight with meticulous devotion and boundless affection. The entrecôte is adorned with seasoned butter, accompanied by truffle-infused potatoes and grilled salad. Oh, what summertime splendor!  (LF, GF)</p>
                    <span class="price">
                        32 € / 250G
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="menubycate">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <h3 class="title_cate">SWEET</h3>
                <p class="desc">
                    “Because a meal without dessert is like a grandfather without a moustache.”
                </p>
                <span class="owner">— Gustav’s grandchildren</span>
                <div class="meal">
                    <h3 class="title">PUFF PANCAKE</h3>
                    <p>Gustav’s grandchildren’s favourite dessert ignites an exuberant whirlwind within the most cynical of dessert connoisseurs: Finnish puff pancake, prepared using the family’s treasured recipe, served with white chocolate, strawberry jelly, and rosemary-infused ice cream. The memories of triumphant fishing expeditions and the essence of summertime linger ever so close, awaiting to be relished with just a spoonful.  (LF,GF)</p>
                    <span class="price">
                        10 €
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">RHUBARB PUDDING</h3>
                    <p>Born from a spontaneous moment, on a sun-drenched summer's day, as Gustav’s neighbor shouted over the fence, offering a bundle of freshly plucked rhubarb, exclaiming, “Create something delightful from these!”. Embracing the invitation with fervour, our host swiftly embarked on the culinary quest, conjuring a luscious rhubarb pudding complemented by ginger granita alongside coconut ice cream. The neighbour loved it as well – enough to have a second helping.  (LF, GF)</p>
                    <span class="price">
                        10 €
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">CHOCOLATE CAKE</h3>
                    <p>This classic dessert has graced our tables since time immemorial. The chocolate cake, baked to perfection, is a velvety delight that ensures holistic satisfaction. While the cake could easily stand alone as a masterpiece on the plate, Gustav, driven by his perpetual quest for culinary excellence, crafts a luscious thick sauce of salty caramel, harmoniously paired with his homemade vanilla ice cream.  (LF, GF)</p>
                    <span class="price">
                        10 €
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="menubycate">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <h3 class="title_cate">KIDS</h3>
                <p class="desc">
                    Children’s menu is available only with a dining group
                </p>

                <div class="meal">
                    <h3 class="title">FRIED FISH OF THE DAY</h3>
                    <p>with french fries or potato puree</p>
                    <span class="price">
                        3.90€
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">MEATBALLS</h3>
                    <p>with french fries or potato puree</p>
                    <span class="price">
                        3.90€
                    </span>
                </div>
                <div class="meal">
                    <h3 class="title">ICE CREAM</h3>
                    <p>vanilla, rosemary or coconut</p>
                    <span class="price">
                        3.00€
                    </span>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection

