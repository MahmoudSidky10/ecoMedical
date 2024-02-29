@extends('site.layout.index')
@section('body-class'," ")
@section('content')


    <main class="main order">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a>{{__("language.orderDetails")}}</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    {{__("language.orderDetailsThanks")}}
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>{{__("language.order_number")}}</label>
                        <strong>{{$order->id}}</strong>
                    </li>
                    <li>
                        <label>{{__("language.status")}}</label>
                        <strong>On hold</strong>
                    </li>
                    <li>
                        <label>{{__("language.date")}}</label>
                        <strong>{{$order->created_at->format("D m, Y")}}</strong>
                    </li>
                    <li>
                        <label>{{__("language.totalPrice")}}</label>
                        <strong>{{$order->total}} {{$setting->app_currency}} </strong>
                    </li>
                    <li>
                        <label>{{__("language.paymenttype")}}</label>
                        <strong>Home Cash</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">{{__("language.order_details")}}</h4>
                    <table class="order-table">
                        <thead>
                        <tr>
                            <th class="text-dark">{{__("language.product")}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $prod)
                            <tr>
                                <td>
                                    <a href="#">{{@$prod->product->name}}</a>&nbsp;<strong>x {{$prod->count}}</strong><br>
                                </td>
                                <td>  {{($prod->count  * $prod->price)}} {{$setting->app_currency}} </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__("language.price")}} :</th>
                            <td> {{$order->subtotal + $order->coupon_discount ?? 0}}  {{$setting->app_currency}} </td>
                        </tr>
                        @if($order->coupon_discount)
                            <tr>
                                <th>{{__("language.discount")}}:</th>
                                <td> {{$order->coupon_discount}}  {{$setting->app_currency}} </td>
                            </tr>
                        @endif
                        <tr>
                            <th>{{__("language.delivery_cost")}}:</th>
                            <td> {{$order->delivery_cost}}  {{$setting->app_currency}} </td>
                        </tr>
                        <tr class="total">
                            <th class="border-no">{{__("language.totalPrice")}}:</th>
                            <td class="border-no">
                                 {{$order->total }} {{$setting->app_currency}} </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->

                <a href="{{route("user.orders")}}"
                   class="btn btn-dark btn-rounded btn-icon-left btn_icon_rotate btn-back mt-6"><i
                            class="w-icon-long-arrow-left"></i>{{__("language.orders")}}</a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>


@endsection



