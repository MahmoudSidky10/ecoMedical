@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')



    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">{{__("language.compare")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                @if (count($items))
                    <div class="compare-table">
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-products">
                            <div class="compare-col compare-field">{{__("language.name")}}</div>

                            @foreach ($items as $item)
                                <div class=" comp-prod-{{$item->id}} compare-col compare-product">
                                    <a onclick="removeItemFromCompareList({{$item->id}})" class="btn remove-product"><i
                                                class="w-icon-times-solid"></i></a>
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{route("site.product.details",@$item->product->slug)}}">
                                                <img src="../{{@$item->product->image}}" alt="Product" width="228"
                                                     height="257"/>
                                            </a>
                                            <div class="product-action-vertical">
                                                @include("site.layout.add-to-cart" , ['product' => $item->product])
                                                <a onclick="storeItemIntoWishList({{$item->product->id}})"
                                                   class="btn-product-icon btn-wishlist btn-wishlist-product-{{$item->product->id}} @if($item->product->checkWishList() == true)  w-icon-heart-full @else w-icon-heart @endif "><span></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name"><a
                                                        href="{{route("site.product.details",@$item->product->slug)}}">{{@$item->product->name}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- End of Compare Products -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-price">
                            <div class="compare-col compare-field">{{__("language.price")}}</div>
                            @foreach ($items as $item)
                                <div class="comp-prod-{{$item->id}}  compare-col compare-value">
                                    <div class="product-price">
                                        <span class="new-price">{{@$item->product->cost}}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- End of Compare Price -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-availability">
                            <div class="compare-col compare-field">{{__("language.stock_count")}}</div>
                            @foreach ($items as $item)
                                <div class="comp-prod-{{$item->id}}  compare-col compare-value">@if(@$item->product->stock_quantity > 0)
                                        In
                                        Stock  @else Not In Stock @endif</div>
                            @endforeach
                        </div>

                        <!-- End of Compare Reviews -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-category">
                            <div class="compare-col compare-field">{{__("language.category")}}</div>
                            @foreach ($items as $item)
                                <div class="comp-prod-{{$item->id}}  compare-col compare-value">{{@$item->product->category->name}}</div>
                            @endforeach
                        </div>
                        <!-- End of Compare Category -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-meta">
                            <div class="compare-col compare-field">{{__("language.SKU")}}</div>
                            @foreach ($items as $item)
                                <div class="comp-prod-{{$item->id}}  compare-col compare-value">{{@$item->product->model_number}}</div>
                            @endforeach
                        </div>
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-brand">
                            <div class="compare-col compare-field">{{__("language.brand")}}</div>
                            @foreach ($items as $item)
                                <div class="comp-prod-{{$item->id}}  compare-col compare-value">{{@$item->product->brand->name}}</div>
                            @endforeach
                        </div>
                        <!-- End of Compare Brand -->
                    </div>
                @else
                    <h4 class="text-center mt-5">  {{__("language.noProductShow")}} , <span> <a
                                    href="{{route("site.home")}}">{{__("language.home")}}</a> </span></h4>
                @endif
            </div>
            <!-- End of Compare Table -->
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->


@endsection
