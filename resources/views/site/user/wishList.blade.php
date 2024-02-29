@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')

    <main class="main wishlist-page">

        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.wishlist")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of PageContent -->
        <div class="page-content mt-3">
            <div class="container">
                @if (count($items) > 0 )
                    <table class="shop-table wishlist-table">
                        <thead>
                        <tr>
                            <th class="product-name"><span>{{__("language.name")}}</span></th>
                            <th></th>
                            <th class="product-price"><span>{{__("language.price")}}</span></th>
                            <th class="product-stock-status"><span>{{__("language.stock_quantity")}}</span></th>
                            <th class="wishlist-action">{{__("language.settings")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            @if ($item->product)
                                <tr id="product-item-{{$item->id}}">
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="{{route("site.product.details",@$item->product->slug)}}">
                                                <figure>
                                                    <img src="../{{@$item->product->image}}"
                                                         alt="{{@$item->product->name}}"
                                                         width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="button" onclick="removeItemFromWishList({{$item->id}})"
                                                    class="btn btn-close"><i
                                                        class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{route("site.product.details",@$item->product->slug)}}">
                                            {{$item->product->name}}
                                        </a>
                                    </td>
                                    <td class="product-price">
                                        <ins class="new-price">{{$item->product->cost}}</ins>
                                    </td>
                                    <td class="product-stock-status">
                                <span class="wishlist-in-stock"> @if(@$item->product->stock_quantity > 0) In
                                    Stock  @else Not In Stock @endif</span>
                                    </td>
                                    <td class="wishlist-action">
                                        <div class="d-lg-flex">
                                            <a href="{{route("site.product.details",@$item->product->slug)}}"
                                               class="btn  btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0"
                                               style="margin: 0 10px">{{__("language.product_details")}}</a>


                                            @auth
                                                @if (auth()->user()->checkCartProduct($item->product->id))
                                                    <div class="fix-bottom product-sticky-content sticky-content">
                                                        <div class="product-form container">
                                                            <button onclick="storeItemIntoCart({{$item->product->id}})"
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
                                                                    onclick="storeItemIntoCart({{$item->product->id}})">
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
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 class="text-center ">{{__("language.no_data")}}</h4>
                @endif
            </div>
        </div>
        <!-- End of PageContent -->
    </main>

@endsection
