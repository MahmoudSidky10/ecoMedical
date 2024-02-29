<!-- Start of Header -->
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                @auth
                    <p class="welcome-msg">{{__("language.welcome_msg")}} ( <strong
                                style="font-weight: bold">{{auth()->user()->name}}</strong>
                        ) </p>
                @else
                    <p class="welcome-msg">{{__("language.client_welcome_msg")}}   </p>
                @endauth
            </div>
            <div class="header-right">

                <!-- End of DropDown Menu -->

                <div class="dropdown">
                    {{--                                <a href="#language"><img src="assets/images/flags/eng.png" alt="ENG Flag" width="14"--}}
                    {{--                                                         height="8" class="dropdown-image"/> AR</a>--}}
                    {{--                                <div class="dropdown-box">--}}
                    {{--                                    <a href="#ENG">--}}
                    {{--                                        <img src="assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"--}}
                    {{--                                             class="dropdown-image"/>--}}
                    {{--                                        ENG--}}
                    {{--                                    </a>--}}
                    {{--                                    <a href="#FRA">--}}
                    {{--                                        <img src="assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"--}}
                    {{--                                             class="dropdown-image"/>--}}
                    {{--                                        FRA--}}
                    {{--                                    </a>--}}
                    {{--                                </div>--}}
                </div>
                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
                {{--                <a href="blog.html" class="d-lg-show">Blog</a>--}}
                {{--                <a href="contact-us.html" class="d-lg-show">Contact Us</a>--}}
                @auth
                    <a href="{{route("profile")}}" class="d-lg-show">{{__("language.profile")}}</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{route("logout")}}"
                       class="ml-0 d-lg-show login register">{{__("language.logout")}}</a>
                @endauth
                @guest
                    <a href="{{route("login")}}" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>{{__("language.login")}}  </a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{route("site.register.view")}}"
                       class="ml-0 d-lg-show login register">{{__("language.register")}}</a>
                @endguest
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <!-- start top sin in -->
<!-- <div class="d-block sinin_top">
        @auth
    <a href="{{route("profile")}}" class="mr-2 d-md-none_custom  btn btn-dark btn btn-outline
                btn-rounded "> {{__("language.profile")}}
            </a>
            <a href="{{route("logout")}}" class="mr-2 d-md-none_custom  btn btn-dark btn-rounded">   {{__("language.logout")}}
            </a>
        @endauth
@guest
    <a href="{{route("login")}}" class="mr-2 d-md-none_custom  btn btn-dark btn btn-outline
                btn-rounded ">  {{__("language.login")}}
            </a>
            <a href="{{route("site.register.view")}}" class="mr-2 d-md-none_custom  btn btn-dark btn-rounded"> {{__("language.register")}}
            </a>
        @endguest
        </div> -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                </a>
                <a href="#" class="logo ml-lg-0">
                    <img src="../../{{$setting->app_logo}}" alt="logo" width="50"
                         height="50"/>
                </a>
            </div>
            <!-- End of Header Left -->

            <div class="header-center">
                <form method="get" action="{{route("site.search")}}"
                      class="header-search hs-rounded d-none d-md-flex ml-4 ml-lg-0 input-wrapper">
                    <input type="text" class="form-control" name="name" id="search"
                           placeholder="بحث ...." value="{{request()->name}}" required/>
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <!-- End of Header Center -->

            <div class="header-right">

                @auth
                    <a href="{{route("profile")}}" class="mr-2 d-md-none_custom  btn btn-dark btn btn-outline 
                        btn-rounded "> {{__("language.profile")}}
                    </a>
                    <a href="{{route("logout")}}"
                       class="mr-2 d-md-none_custom  btn btn-dark btn-rounded">   {{__("language.logout")}}
                    </a>
                @endauth
                @guest
                    <a href="{{route("login")}}" class="mr-2 d-md-none_custom  btn btn-dark btn btn-outline 
                        btn-rounded ">  {{__("language.login")}}
                    </a>
                    <a href="{{route("site.register.view")}}"
                       class="mr-2 d-md-none_custom  btn btn-dark btn-rounded"> {{__("language.register")}}
                    </a>
                @endguest

                <div class="header-call d-xs-show d-lg-flex align-items-center">

                </div>

                @auth

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.wishList")}}" class="cart-toggle label-down link">
                            <i class="w-icon-heart wishListCounterDiv">

                            <span id="wishListCount"
                                  class="cart-count @if(auth()->user()->wishListCount() > 0 ) @else hide @endif">  {{auth()->user()->wishListCount() }} </span>

                            </i>
                            <span class="cart-label">{{__("language.wishlist")}}</span>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.compareList")}}" class="cart-toggle label-down link">
                            <i class="w-icon-compare compareCounterDiv">

                            <span id="compareCount"
                                  class="cart-count @if(auth()->user()->compareListCount() > 0 ) @else hide @endif">  {{auth()->user()->compareListCount() }} </span>

                            </i>
                            <span class="cart-label">{{__("language.compare")}}</span>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.cart.products")}}" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <span id="cartCount"
                                      class="cart-count  @if(auth()->user()->cartListCount() > 0 ) @else hide @endif ">{{auth()->user()->cartListCount() }}</span>
                            </i>
                            <span class="cart-label">{{__("language.cart")}}</span>
                        </a>
                    </div>

                @else

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.wishList")}}" class="cart-toggle label-down link">
                            <i class="w-icon-heart wishListCounterDiv">
                            </i>
                            <span class="cart-label">{{__("language.wishlist")}}</span>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.compareList")}}" class="cart-toggle label-down link">
                            <i class="w-icon-compare compareCounterDiv">
                            </i>
                            <span class="cart-label">{{__("language.compare")}}</span>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="{{route("user.cart.products")}}" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                            </i>
                            <span class="cart-label">{{__("language.cart")}}</span>
                        </a>
                    </div>


                @endauth

            </div>

            <!-- End of Header Right -->
        </div>
    </div>
    <!-- start search scereen mini -->
    <div class="search_mini_screen d_md_block_custom ">
        <form method="get" action="#" class="text-center mb-5">
            <input style="display:inline-block;width:50%" type="text" class="form-control w-50 " name="search"
                   id="search"
                   placeholder="بحث ...." required/>
            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
            </button>
        </form>
    </div>


    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true" data-display="static"
                           title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>{{__("language.categories")}}</span>
                        </a>

                        <div class="dropdown-box">

                            <ul class="menu vertical-menu category-menu">
                                @foreach(\App\Models\Category::where("parent_id")->get() as $category)
                                    <li>
                                        <a href="{{route("site.category-products",[$category->id ,$category->slug])}}">
                                            <i class="w-icon-list"></i>{{$category->name}}
                                        </a>
                                        <ul style="min-width: 180px; padding:0" class="megamenu">
                                            @if (count($category->childCategories) > 0 )
                                                <li class="w-100 pt-2">
                                                    <ul id="v1">
                                                        @foreach($category->childCategories as $childCategory)
                                                            <li class="third_level_cat w-100">
                                                                <a href="{{route("site.category-products",[$childCategory->id ,$childCategory->slug])}}">{{$childCategory->name}}</a>
                                                                @if (count($childCategory->childCategories) > 0 )
                                                                    <ul class="third_level_catogery"
                                                                        style="padding-top:0;position: absolute;margin: 0;top: -9999px;left: 100%;box-shadow: 0 2px 35px rgb(0 0 0 / 10%);z-index: 1001;visibility: hidden;opacity: 1;    transition: transform 0.3s ease-out;    transform: translate3d(0, -10px, 0);">
                                                                        @foreach($childCategory->childCategories as $childOneCategory)
                                                                            <li>
                                                                                <a href="{{route("site.category-products",[$childOneCategory->id ,$childOneCategory->slug])}}">{{$childOneCategory->name}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">

                            <li class="active">
                                <a href="{{route("site.home")}}">{{__("language.home")}}</a>
                            </li>

                            <li class="">
                                <a href="{{route("login")}}">{{__("تسجيل حساب")}}</a>
                            </li>

                            <li class="">
                                <a href="{{route("site.home")}}">{{__("المتجر")}}</a>
                            </li>

                            <li class="">
                                <a href="{{route("site.offer-products")}}">{{__("العروض والخصومات")}}</a>
                            </li>

                            <li class="">
                                <a href="{{route("user.cart.products")}}">{{__("انهاء الطلب")}}</a>
                            </li>

                            <li class=""></li>

                            <li class="">
                                <a href="{{route("user.cart.products")}}">{{__("سله المشتريات")}}</a>
                            </li>


                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    {{--                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>--}}
                    {{--                    <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>--}}
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->