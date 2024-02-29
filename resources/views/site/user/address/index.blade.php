@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.address")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2 mt-3">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        @includeIf("site.user.side-bar",["page" => "address"])
                    </ul>
                    <div class="tab-content mb-6">

                        <div class="tab-pane active in">

                            <a href="{{route("user.address.create")}}"
                               class="btn btn-dark btn-rounded btn-icon-right mt-1"> {{__("language.add")}} <i
                                        class="w-icon-map-marker"></i></a>

                            @if (auth()->user()->cartListCount() > 0)
                                <a href="{{route("user.cart.products")}}"
                                   class="btn btn-primary btn-rounded btn-icon-right mt-1"> {{__("language.continueCartCheckout")}}
                                    <i
                                            class="w-icon-cart"></i></a>
                            @endif


                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="country_id">{{__("language.country")}} </th>
                                    <th class="governorate_id">{{__("language.governorate")}} </th>
                                    <th class="street">{{__("language.address")}} </th>
                                    <th class="order-actions">{{__("language.edit")}} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="">{{@$item->country->name}}</td>
                                        <td class="">{{@$item->governorate->name}}</td>
                                        <td class="">{{$item->street}}</td>
                                        <td class="order-action">
                                            <a href="{{route("user.address.edit",$item->id)}}"
                                               class="btn btn-secondary btn-outline btn-ellipse"> <i
                                                        class="w-icon-tools"></i> {{__("language.edit")}} </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection