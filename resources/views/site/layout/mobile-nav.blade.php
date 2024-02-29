<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper ">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <!-- <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form> -->
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="main-menu_taB" href="#" class="nav-link active">القائمة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a id="categories_taB" href="#" class="nav-link">{{__("language.categories")}}</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{route("site.home")}}">{{__("language.home")}}</a></li>
                    @guest
                        <li><a href="{{route("site.login")}}">{{__("language.login")}}</a></li>
                        <li><a href="{{route("site.register")}}">{{__("language.register")}}</a></li>
                    @endguest
                    @auth
                        <li><a href="{{route("profile")}}">{{__("language.profile")}}</a></li>
                        <li><a href="{{route("user.wishList")}}">{{__("language.wishlist")}}</a></li>
                        <li><a href="{{route("user.compareList")}}">{{__("language.compare")}}</a></li>
                        <li><a href="{{route("user.cart.products")}}">{{__("language.cart")}}</a></li>
                        <li><a href="{{route("logout")}}">{{__("language.logout")}}</a></li>
                    @endauth
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach(\App\Models\Category::where("parent_id")->get() as $category)
                        <li>
                            <a href="{{route("site.category-products",[$category->id ,$category->slug])}}">
                                {{$category->name}}
                            </a>
                            <ul>
                                @foreach($category->childCategories as $childCategory)
                                    <li>
                                        <a href="{{route("site.category-products",[$childCategory->id ,$childCategory->slug])}}">{{$childCategory->name}}</a>

                                        @if (count($childCategory->childCategories) > 0 )
                                            <ul>
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
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->