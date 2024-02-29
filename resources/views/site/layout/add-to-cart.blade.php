@auth
    @if (auth()->user()->checkCartProduct($product->id))
        <a onclick="storeItemIntoCart({{$product->id}})"
           class="btn-product-icon cart-btn-icon  w-icon-check"
           title="{{__("language.remove_from_cart")}}"></a>
    @else
        <a onclick="storeItemIntoCart({{$product->id}})"
           class="btn-product-icon cart-btn-icon   w-icon-cart"
           title="{{__("language.add_to_cart")}}"></a>
    @endif
@else
    <a href="{{route("site.need-login")}}"
       class="btn-product-icon  w-icon-cart"
       title="{{__("language.add_to_cart")}}"></a>
@endauth