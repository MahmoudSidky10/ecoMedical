@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.profile")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->


        <!-- Start of PageContent -->
        <div class="page-content pt-2 mt-3">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        @includeIf("site.user.side-bar",["page" => "profile"])
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <br>
{{--                         --}}{{--   <p class="greeting">--}}
{{--                                Hello--}}
{{--                                <span class="text-dark font-weight-bold">{{$user->name}}</span>--}}
{{--                                (not--}}
{{--                                <span class="text-dark font-weight-bold">{{$user->name}}</span>?--}}
{{--                                <a href="{{route("logout")}}" class="text-primary">Log out</a>)--}}
{{--                            </p>--}}

{{--                            <p class="mb-4">--}}
{{--                                From your account dashboard you can view your <a href="{{route("user.orders")}}"--}}
{{--                                                                                 class="text-primary link-to-tab">recent--}}
{{--                                    orders</a>,--}}
{{--                                manage your <a href="{{route("user.address")}}" class="text-primary link-to-tab">shipping--}}
{{--                                    and billing--}}
{{--                                    addresses</a>, and--}}
{{--                                <a href="{{route("user.editProfile")}}" class="text-primary link-to-tab">edit your--}}
{{--                                    password and--}}
{{--                                    account details.</a>--}}
{{--                            </p>--}}

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.orders")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.orders")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.address")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.address")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.editProfile")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.profile_details")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.wishList")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.wishlist")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.compareList")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-compare">
                                                    <i class="w-icon-compare"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.compare")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route("user.cart.products")}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-cart">
                                                    <i class="w-icon-cart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">{{__("language.cart")}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
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