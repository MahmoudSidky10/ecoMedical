<li class="nav-item">
    <a href="{{route("profile")}}" class="nav-link @if($page =="profile") active @endif">{{__("language.dashboard")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.orders")}}" class="nav-link @if($page =="orders") active @endif">{{__("language.orders")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.address")}}" class="nav-link @if($page =="address") active @endif">{{__("language.address")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.editProfile")}}" class="nav-link @if($page =="editProfile") active @endif">{{__("language.profile_details")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.wishList")}}" class="nav-link @if($page =="wishList") active @endif">{{__("language.wishlist")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.compareList")}}" class="nav-link @if($page =="compareList") active @endif">{{__("language.compare")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("user.cart.products")}}" class="nav-link @if($page =="cart") active @endif">{{__("language.cart")}}</a>
</li>
<li class="nav-item">
    <a href="{{route("logout")}}" class="nav-link">{{__("language.logout")}}</a>
</li>
