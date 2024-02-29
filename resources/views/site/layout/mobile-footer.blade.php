<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{route("site.home")}}" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>{{__("language.home")}}</p>
    </a>
    @guest
        <a href="{{route("login")}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>{{__("language.login")}} / {{__("language.register")}} </p>
        </a>
    @endguest
    @auth
        <div class="cart-dropdown dir-up">
            <a href="{{route("user.cart.products")}}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>{{__("language.cart")}}</p>
            </a>
        </div>

        <div class="cart-dropdown dir-up">
            <a href="{{route("user.compareList")}}" class="sticky-link">
                <i class="w-icon-compare"></i>
                <p>{{__("language.compare")}}</p>
            </a>
        </div>

        <div class="cart-dropdown dir-up">
            <a href="{{route("user.wishList")}}" class="sticky-link">
                <i class="w-icon-heart"></i>
                <p>{{__("language.wishlist")}}</p>
            </a>
        </div>
    @endauth
</div>
<!-- End of Sticky Footer -->