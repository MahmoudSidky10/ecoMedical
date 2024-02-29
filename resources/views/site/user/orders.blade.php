@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.orders")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2 mt-3">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        @includeIf("site.user.side-bar",["page" => "orders"])
                    </ul>

                    <div class="tab-content mb-6">

                        <div class="tab-pane mb-4 active in">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">{{__("language.orders")}}</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">{{__("language.order_id")}}</th>
                                    <th class="order-date">{{__("language.date")}}</th>
                                    <th class="order-status">{{__("language.status")}}</th>
                                    <th class="order-total">{{__("language.totalPrice")}}</th>
                                    <th class="order-total">{{__("language.cartTotalPrice")}}</th>
                                    <th class="order-actions">{{__("language.settings")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="order-id">#{{$order->id}}</td>
                                        <td class="order-date">{{$order->created_at->format("d M Y")}}</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price"> {{$order->subtotal}}  {{$setting->app_currency}} </span>
                                            (
                                            <span class="order-quantity"> {{count($order->products)}} </span> {{__("language.product")}}
                                            )
                                        </td>
                                        <td> {{$order->total}}  {{$setting->app_currency}} </td>
                                        <td class="order-action">
                                            <a href="{{route("user.cart.products.invoice",$order->guid)}}"
                                               class="btn btn-outline btn-default btn-block btn-sm btn-rounded">{{__("language.show")}}</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="{{route("site.home")}}"
                               class="btn btn-dark btn-rounded btn-icon-right">{{__("language.home")}}
                                <i class="w-icon-long-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection