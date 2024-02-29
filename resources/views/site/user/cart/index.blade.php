@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')

    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{route("user.cart.products")}}">{{__("language.cart")}}</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                            <tr>
                                <th class="product-name"><span>{{__("language.name")}}</span></th>
                                <th></th>
                                <th class="product-price"><span>{{__("language.price")}}</span></th>
                                <th class="product-quantity"><span>{{__("language.quantity")}}</span></th>
                                <th class="product-subtotal"><span>{{__("language.totalPrice")}}</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cartProducts as $cartProduct)
                                <tr class="cart-prod-{{$cartProduct->id}}">
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="{{route("site.product.details",@$cartProduct->product->slug)}}">
                                                <figure>
                                                    <img src="../{{@$cartProduct->product->image}}" alt="product"
                                                         width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="button" onclick="removeItemFromCartList({{$cartProduct->id}})"
                                                    class="btn btn-close"><i
                                                        class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{route("site.product.details",@$cartProduct->product->slug)}}">
                                            {{@$cartProduct->product->name}}
                                        </a>
                                    </td>
                                    <td class="product-price"><span
                                                class="amount">{{@$cartProduct->price}} {{$setting->app_currency}} </span></td>
                                    <td class="product-quantity">
                                        <div class="input-group">

                                            <div class="value-button" id="decrease-{{$cartProduct->id}}"
                                                 onclick="quantityMinusAction({{$cartProduct->id}} , {{$cartProduct->price}} )"
                                                 value="Decrease Value">-
                                            </div>
                                            <input class="cart-product-count-{{$cartProduct->id}} number-design"
                                                   type="number"  onkeyup="quantityMinusAction({{$cartProduct->id}} , {{$cartProduct->price}} )"
                                                   id="number-{{$cartProduct->id}}" value="{{$cartProduct->count}}"
                                                   min="1"
                                                   max="{{@$cartProduct->product->stock_quantity}}"/>
                                            <div class="value-button" id="increase-{{$cartProduct->id}}"
                                                 onclick="quantityPlusAction({{$cartProduct->id}} , {{$cartProduct->price}} , {{@$cartProduct->product->stock_quantity}})"
                                                 value="Increase Value"> +
                                            </div>

                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span id="cart-product-amount-{{$cartProduct->id}}"
                                               class="amount cart-sub-amount">{{@$cartProduct->price * $cartProduct->count}}  </span> {{$setting->app_currency}}
                                    </td>
                                </tr>
                            @empty
                                <tr class="cart-prod-0">
                                    <td colspan="5"> <h5> لا توجد منتجات في سلة المشتريات .  </h5> </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <br> <br>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">{{__("language.cartTotalPrice")}}</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">{{__("language.totalPrice")}}</label>
                                    <span>  <span
                                                id="cart-total-price">{{auth()->user()->cartListTotalPrice()}}</span> <b>{{$setting->app_currency}}</b> </span>
                                </div>

                                <hr class="divider">
                                <form class="shipping-calculator-form" method="post"
                                      action="{{route("user.cart.products.store")}}">
                                    @csrf

                                    @if(count($cartProducts) > 0 )
                                        <input id="couponId" name="couponId" class="form-control form-control-md" type="hidden">
                                    <div class="shipping-calculator">
                                        <div class="form-group">
                                            <div class=" ">
                                                <label> {{__("language.addNewAddress")}}<a class=""
                                                                                           href="{{route("user.address.create")}}">
                                                        {{__("language.add")}}</a></label>
                                                @if (count(auth()->user()->address) > 0 )
                                                    <select name="address_id" class="form-control form-control-md mt-2">
                                                        @foreach(auth()->user()->address as $address)
                                                            <option value="{{$address->id}}">{{@$address->country->name}}
                                                                / {{@$address->governorate->name}}
                                                                / {{$address->street}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <div class="form-group">
                                        <label class="mb-2">اذا كنت تملك كود خصم ادخله هنا</label>
                                        <input style="display:inline-block;width: calc(100% - 100px);" id="code"
                                               class="form-control form-control-md" type="text"
                                               placeholder="كود الخصم">
                                        <button type="button" class="btn btn-dark btn-outline btn-rounded mb-0"
                                                onclick="checkCouponCode()">تحقق
                                        </button>
                                        <label class="mt-2 done_discount hide"><i class="fas fa-check-double"></i> تم
                                            تفعيل
                                            كود الخصم بنجاح </label>
                                        <label class="mt-2 error_discount hide"><i
                                                    class="fas fa-exclamation-triangle"></i>
                                            كود خصم غير فعال </label>
                                    </div>
                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>{{__("language.cartTotalPrice")}}</label>
                                        <span> <span
                                                    id="cart-sub-price">{{ auth()->user()->cartListTotalPrice() }} </span> <b>{{$setting->app_currency}}</b> </span>

                                    </div>
                                    @endif

                                    @if (count(auth()->user()->address) > 0 )
                                        @if(count($cartProducts) > 0 )
                                            <button type="submit"
                                                    class="btn btn-block btn-dark btn-icon-right btn-rounded btn_icon_rotate btn-checkout">
                                                {{__("language.Proceedtocheckout")}} <i class="w-icon-long-arrow-right"></i>
                                            </button>
                                        @else
                                            <a href="{{route("site.home")}}"
                                               class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                                {{__("language.add_to_cart")}} <i class="w-icon-long-arrow-right"></i></a>
                                        @endif
                                    @else
                                        <a href="{{route("user.address.create")}}"
                                           class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                            {{__("language.addNewAddress")}} <i class="w-icon-long-arrow-right"></i></a>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
@section("css")
    <style>
        .value-button {
            display: inline-block;
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            padding: 11px 0;
            background: #eee;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .value-button:hover {
            cursor: pointer;
        }


        input.number-design {
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
