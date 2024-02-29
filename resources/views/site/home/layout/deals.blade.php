<!-- Deals -->
<div class="container-fluid mt-3">

    <div class="row deals-wrapper appear-animate mb-7">
        <div class="col-lg-1 mb-4"></div>
        <div class="col-lg-5 mb-4">
            <div class="single-product h-100 br-sm">
                <h4 class="title-sm title-underline font-weight-bolder">{{__("language.dealOfDay")}}</h4>
                <div class="owl-carousel owl-theme owl-nav-top owl-nav-lg row cols-1 gutter-no"
                     data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20,
                                'items': 1
                            }">
                    @foreach(\App\Models\Product::query()->inRandomOrder()->take(1)->get() as $prod)
                        <div class="product product-single row align-items-center">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="product-gallery product-gallery-vertical mb-0">
                                    <div
                                            class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        @foreach($prod->images as $img)
                                            <figure class="product-image">
                                                <img src="{{$img->image}}"
                                                     data-zoom-image="{{$img->image}}"
                                                     alt="Product Image" width="800" height="900">
                                            </figure>
                                        @endforeach

                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs">
                                            @foreach($prod->images as $img)
                                                <div class="product-thumb @if ($loop->first) active @endif">
                                                    <img src="{{$img->image}}"
                                                         alt="Product thumb" width="60" height="68"/>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details scrollable">
                                    <h2 class="product-title mb-1"><a
                                                href="{{url("/product-details/$prod->slug")}}">{{$prod->name}}</a></h2>

                                    <hr class="product-divider">

                                    <div class="product-price">
                                        <ins class="new-price ls-50"> {{$prod->cost}}
                                        </ins>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="product-link-wrapper d-flex">
                                            @auth
                                                <a onclick="storeItemIntoWishList({{$prod->id}})"
                                                   class="btn-product-icon btn-wishlist btn-wishlist-product-{{$prod->id}} @if($prod->checkWishList() == true)  w-icon-heart-full @else w-icon-heart @endif "><span></span></a>

                                                <a onclick="storeItemIntoCompareList({{$prod->id}})"
                                                   class="btn-product-icon  btn-wishlist btn-icon-left
                                                           btn-compare-product-{{$prod->id}} @if($prod->checkCompareList() == true)  w-icon-check-solid @else w-icon-compare @endif
                                                           "><span></span></a>
                                            @else
                                                <a href="{{route("site.need-login")}}"
                                                   class="btn-product-icon w-icon-heart"><span></span></a>
                                                <a href="{{route("site.need-login")}}"
                                                   class="btn-product-icon btn-icon-left w-icon-compare"><span></span></a>
                                            @endauth

                                        </div>
                                    </div>

                                    <div class="product-form pt-4">

                                        @auth
                                            @if (auth()->user()->checkCartProduct($prod->id))
                                                <div class="fix-bottom product-sticky-content sticky-content">
                                                    <div class="product-form container">
                                                        <button onclick="storeItemIntoCart({{$prod->id}})"
                                                                class="btn btn-primary ">
                                                            <i class="w-icon-check"></i>
                                                            <span>{{__("language.remove_from_cart")}}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="fix-bottom product-sticky-content sticky-content">
                                                    <div class="product-form container">
                                                        <button class="btn btn-primary "
                                                                onclick="storeItemIntoCart({{$prod->id}})">
                                                            <i class="w-icon-cart cart-btn-icon"></i>
                                                            <span class="cart-btn-txt">{{__("language.add_to_cart")}}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif

                                        @else
                                            <div class="fix-bottom product-sticky-content sticky-content">
                                                <div class="product-form container">
                                                    <a href="{{route("site.need-login")}}" class="btn btn-primary ">
                                                        <i class="w-icon-cart cart-btn-icon"></i>
                                                        <span class="cart-btn-txt">{{__("language.add_to_cart")}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endauth
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
            <!-- End of Product Single -->
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="widget widget-products widget-products-bordered h-100">
                <div class="widget-body br-sm h-100">
                    <h4 class="title-sm title-underline font-weight-bolder mb-2">{{__("language.top3BestSeller")}}</h4>
                    <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3"
                         data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                        <div class="product-widget-wrap">
                            @foreach(\App\Models\Product::take(3)->get() as $prod)
                                <div class="product product-widget bb-no">
                                    <figure class="product-media">
                                        <a href="{{url("/product-details/$prod->slug")}}">
                                            <img src="{{$prod->image}}"
                                                 alt="Product"
                                                 width="105" height="118"/>
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{url("/product-details/$prod->slug")}}">{{$prod->name}}</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">{{$prod->cost}}</ins>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="widget widget-products widget-products-bordered h-100">
                <div class="widget-body br-sm h-100">
                    <h4 class="title-sm title-underline font-weight-bolder mb-2">{{__("ثلاثه منتجات من اختيارنا")}}</h4>
                    <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3"
                         data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                        <div class="product-widget-wrap">
                            @foreach(\App\Models\Product::inRandomOrder()->take(3)->get() as $prod)
                                <div class="product product-widget bb-no">
                                    <figure class="product-media">
                                        <a href="{{url("/product-details/$prod->slug")}}">
                                            <img src="{{$prod->image}}"
                                                 alt="Product"
                                                 width="105" height="118"/>
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{url("/product-details/$prod->slug")}}">{{$prod->name}}</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">{{$prod->cost}}</ins>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
