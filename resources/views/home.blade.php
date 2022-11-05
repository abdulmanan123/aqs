@extends('layouts.app')



@section('content')

    <style>

        .owl-carousel.owl-theme .owl-controls .owl-dots{padding-top: 5px !important;}

    </style>

    <div class="divider35"></div>

    <?php
    $user = Auth::user();
    ?>

    <section class="flat-row flat-slider">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="slider owl-carousel-slider">

                        @foreach(getSliders() as $slider)

                            <div class="imagebox style4 v1" style="border: none !important;margin-top: -35px !important;">

                                <div class="box-image">

                                    <a href="#" title="">

                                        <img src="{{ $slider->image_url }}">

                                    </a>

                                </div><!-- /.box-image -->

                            </div><!-- /.imagebox style4 v1 -->

                        @endforeach

                    </div>

                </div>

            </div><!-- /.row -->

        </div><!-- /.container -->

    </section><!-- /.flat-slider -->



    <section class="flat-row flat-banner-box">

        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="banner-box one-half style2">

                        <div class="inner-box">

                            <a href="#" title="">

                                <img src="{{ asset('front_assets/images/banner_boxes/banner-3.png') }}" alt="">

                            </a>

                        </div><!-- /.inner-box -->

                        <div class="inner-box">

                            <a href="#" title="">

                                <img src="{{ asset('front_assets/images/banner_boxes/banner-4.png') }}" alt="">

                            </a>

                        </div><!-- /.inner-box -->

                        <div class="clearfix"></div>

                    </div><!-- /.box -->

                    <div class="banner-box lg">

                        <div class="inner-box">

                            <a href="#" title="">

                                <img src="{{ asset('front_assets/images/banner_boxes/banner-5.png') }}" alt="">

                            </a>

                        </div>

                    </div><!-- /.box -->

                </div><!-- /.col-md-8 -->



                <?php if(@$promotion){ ?>

                <div class="col-md-4">

                    <div class="counter style1">

                        <!-- <span class="item-sale">Save $48.00</span> -->

                        <span class="item-special">{{ $promotion->name }}</span>

                        <div class="counter-content" style="margin-top: 0px;">

                            <div class="owl-carousel-offer" style="margin-bottom:-111px;">

                                <?php foreach($promotion->products as $product){
                                $slug = (!empty($product->slug))?$product->slug:Hashids::encode($product->id)
                                    ?>

                                <div class="imagebox style4 v1" style="border: none !important;margin-top: -35px !important;">

                                    <div class="box-image">

                                        <a href='{{ url("products/$slug") }}'title="">

                                            <img src="{{ $product->default_image_url }}" alt="{{ $product->name }}">

                                        </a>

                                    </div><!-- /.box-image -->

                                    <div class="box-content" style="margin-left: 80px;">

                                        <div class="product-name">

                                            <a href='{{ url("products/$slug") }}' title="">{{ $product->name }}</a>

                                        </div>

                                        <div class="price">


                                            @if($product->discount_type>0)

                                                <span class="regular">£{{ number_format($product->price,2) }}</span>

                                            @endif

                                                <span class="sale">£{{ getDiscountedPrice($product) }}</span>


                                        </div>

                                    </div><!-- /.box-content -->

                                </div><!-- /.imagebox style4 v1 -->

                                <?php } ?>

                            </div><!-- /.owl-carousel-3 -->





                            <div class="count-down">

                                <div class="square">

                                    <div class="numb">

                                        14

                                    </div>

                                    <div class="text">

                                        DAYS

                                    </div>

                                </div>

                                <div class="square">

                                    <div class="numb">

                                        09

                                    </div>

                                    <div class="text">

                                        HOURS

                                    </div>

                                </div>

                                <div class="square">

                                    <div class="numb">

                                        48

                                    </div>

                                    <div class="text">

                                        MINS

                                    </div>

                                </div>

                                <div class="square">

                                    <div class="numb">

                                        23

                                    </div>

                                    <div class="text">

                                        SECS

                                    </div>

                                </div>

                            </div><!-- /.count-down -->

                        </div><!-- /.counter-content -->

                    </div><!-- /.counter -->

                </div><!-- /.col-md-4 -->

                <?php } ?>



            </div><!-- /.row -->

        </div><!-- /.container -->

    </section><!-- /.flat-banner-box -->



    <section class="flat-row flat-imagebox">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="product-tab">

                        <ul class="tab-list">

                            <li class="active get_products" data-param = 'new'>New Arrivals</li>

                            <li class="get_products" data-param="featured">Featured</li>

                            <li class="get_products" data-param="hot">Hot Sale</li>

                        </ul>

                    </div><!-- /.product-tab -->

                </div><!-- /.col-md-12 -->

            </div><!-- /.row -->

            <div class="box-product" id="partial_home_products">

            </div><!-- /.box-product -->

        </div><!-- /.container -->

    </section><!-- /.flat-imagebox -->



    <!-- Most Viewed Products -->

    <section class="flat-row flat-imagebox style4 mv">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="flat-row-title">

                        <h3>Most Viewed</h3>

                    </div><!-- /.flat-row-title -->

                </div><!-- /.col-md-12 -->

            </div><!-- /.row -->

            <div class="row">

                <div class="col-md-12">

                    <div class="owl-carousel-3">

                        <?php

                        foreach($product_views as $product){
                        $slug = (!empty($product->slug))?$product->slug:Hashids::encode($product->id)
                        ?>

                        <div class="imagebox style4 v1">

                            {!! $product->sale_html !!}

                            <div class="box-image">

                                <a href="{{ url('products/'.$slug) }}" title="">

                                    <img src="{{ $product->default_image_url }}" alt="{{ $product->name }}">

                                </a>

                            </div><!-- /.box-image -->

                            <div class="box-content">

                                @if($product->category_products->count()>0)

                                    <div class="cat-name">

                                        <a href="{{ url('products/'.$slug) }}" title="{{ $product->name }}">{{ $product->category_products[0]->category->name }}</a>

                                    </div>

                                @endif

                                <div class="product-name">

                                    <a href="{{ url('products/'.$slug) }}" title="">{{ str_limit($product->name,23) }}</a>

                                </div>

                                <div class="price">

                                    @if(Auth::check() && Auth::guard('web')->check() && $user->type != 'retailer')
                                        <span class="sale">£{{ $product->discountedPrice }}</span>
                                    @else
                                        @if($product->discount_type>0)
                                            <span class="regular">£{{ number_format($product->price,2) }}</span>
                                        @endif
                                        <span class="sale">£{{ $product->discountedPrice }}</span>
                                    @endif

                                </div>

                            </div><!-- /.box-content -->

                        </div><!-- /.imagebox style4 v1 -->

                        <?php } ?>

                    </div><!-- /.owl-carousel-3 -->

                </div><!-- /.col-md-12 -->

            </div><!-- /.row -->

        </div><!-- /.container -->

    </section><!-- /.flat-imagebox style4 -->



    <section class="flat-iconbox">

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    <div class="iconbox">

                        <div class="box-header">

                            <div class="image">

                                <img src="{{asset('front_assets/images/icons/car.png')}}" alt="">

                            </div>

                            <div class="box-title">

                                <h3>Free Shipping</h3>

                            </div>

                        </div><!-- /.box-header -->

                        <div class="box-content">

                            <p>Free Shipping every Order</p>

                        </div><!-- /.box-content -->

                    </div><!-- /.iconbox -->

                </div><!-- /.col-md-3 -->

                <div class="col-md-3">

                    <div class="iconbox">

                        <div class="box-header">

                            <div class="image">

                                <img src="{{asset('front_assets/images/icons/order.png')}}" alt="">

                            </div>

                            <div class="box-title">

                                <h3>Order Online Service</h3>

                            </div>

                        </div><!-- /.box-header -->

                        <div class="box-content">

                            <p>Free return products in 30 days</p>

                        </div><!-- /.box-content -->

                    </div><!-- /.iconbox -->

                </div><!-- /.col-md-3 -->

                <div class="col-md-3">

                    <div class="iconbox">

                        <div class="box-header">

                            <div class="image">

                                <img src="{{asset('front_assets/images/icons/payment.png')}}" alt="">

                            </div>

                            <div class="box-title">

                                <h3>Payment</h3>

                            </div>

                        </div><!-- /.box-header -->

                        <div class="box-content">

                            <p>Secure System</p>

                        </div><!-- /.box-content -->

                    </div><!-- /.iconbox -->

                </div><!-- /.col-md-3 -->

                <div class="col-md-3">

                    <div class="iconbox">

                        <div class="box-header">

                            <div class="image">

                                <img src="{{asset('front_assets/images/icons/return.png')}}" alt="">

                            </div>

                            <div class="box-title">

                                <h3>Return 30 Days</h3>

                            </div>

                        </div><!-- /.box-header -->

                        <div class="box-content">

                            <p>Free return products in 30 days</p>

                        </div><!-- /.box-content -->

                    </div><!-- /.iconbox -->

                </div><!-- /.col-md-3 -->

            </div><!-- /.row -->

        </div><!-- /.container -->

    </section><!-- /.flat-iconbox -->

@endsection



@section('scripts')

    <script type="text/javascript">



        $(document).ready(function() {

            const url = "{{ url('get-home-products') }}";
            const param = 'featured';
            getHomeProducts(url, param);

            $(".get_products").click(function (e) {
                e.preventDefault();
                var param = $(this).attr('data-param');
                show_loader();
                getHomeProducts(url, param);
            });

            //update cart

                <?php if(@$promotion){ ?>

            var before = '<div class="square"><div class="numb">',

                textday = '</div><div class="text">DAYS',

                texthour = '</div><div class="text">HOURS',

                textmin = '</div><div class="text">MINS',

                textsec = '</div><div class="text">SECS';

            $(".count-down").countdown('{{ $promotion->end_time }}', function(event) {

                $(this).html(event.strftime(before + '%D' + textday + '</div></div>' + before + '%H' + texthour + '</div></div>' + before + '%M' + textmin + '</div></div>' + before + '%S' + textsec + '</div>'));

            });// Count Down



            $(".owl-carousel-offer").owlCarousel({

                autoplay:true,

                nav: true,

                dots: false,

                responsive: true,

                margin:30,

                loop:false,

                items:1,
                rewind: true,

                responsive:{

                    0:{items: 1,dots: false,margin:10},

                    479:{items: 1,dots: false},

                    600:{items: 1,dots: false},

                    768:{items: 1,margin:20,},

                    991:{items: 1},

                    1200: {items: 1}

                }

            });

            <?php } ?>



            $(".owl-carousel-slider").owlCarousel({

                autoplay:true,

                nav: false,

                dots: true,

                responsive: true,

                margin:30,

                loop:true,

                items:1,

                responsive:{

                    0:{items: 1,dots: false,margin:10},

                    479:{items: 1,dots: false},

                    600:{items: 1,dots: false},

                    768:{items: 1,margin:20,},

                    991:{items: 1},

                    1200: {items: 1}

                }

            });

        });

        function addRemoveWishlist(product_id){

            var url = "{{ url('products/get-products') }}";

            var current_url     = window.location.href;

            var post_url        = "{{url('add-to-wishlist')}}";

            var current_url_split = current_url.split('?');

            var category_id = getParams('category_id', current_url);

            var page_number = getParams('page', current_url);

            if(!page_number){

                page_number = 1;

            }

            var records =  getParams('records', current_url);

            if(!records){

                records = 12;

            }

            var ordering=  getParams('order', current_url);

            if(!ordering){

                ordering = 'asc';

            }



            if(current_url_split.length>1){

                url = url+'?'+current_url_split[1];

            }else{

                url = url+'?page='+page_number+'&category_id='+category_id;

            }



            var login_check = "{{Auth::check()}}";



            favoriteRequest(product_id, url, records, ordering, login_check, post_url, true);

        }



    </script>

@endsection

