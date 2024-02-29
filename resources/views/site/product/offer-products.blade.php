@extends('site.layout.index')
@section('body-class',"")
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <div class="container-fluid">
            <!-- Start of Shop Content -->
            <div class="shop-content mt-5">
                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    <form id="filter-form" method="get">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-show select-box ">
                                    <label>{{__("language.categories")}} :</label>
                                    <select id="filter-byCategoryFilter" name="category_id" class=" col-md-6 form-control">
                                        <option @if(!request()->category_id) selected @endif value="">{{__("language.all")}}  </option>
                                        @foreach($categories as $category)
                                            <option @if(request()->category_id == $category->id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>{{__("language.sortBy")}} :</label>
                                    <select id="filter-orderBy" name="orderby" class="form-control">
                                        <option @if(request()->orderby == "default" || !request()->orderby) selected
                                                @endif value="default"
                                                selected="selected">{{__("language.sortDefault")}}
                                        </option>
                                        <option @if(request()->orderby == "price-low") selected
                                                @endif  value="price-low">{{__("language.sortLowToHigh")}}
                                        </option>
                                        <option @if(request()->orderby == "price-high") selected
                                                @endif  value="price-high"> {{__("language.sortHighToLow")}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box ">
                                    <select id="filter-show-numbers" name="count" class=" col-md-6 form-control">
                                        <option @if(request()->count == 10 || !request()->count) selected
                                                @endif value="10">{{__("language.show in page")}} 10
                                        </option>
                                        <option @if(request()->count == 15) selected
                                                @endif value="15">{{__("language.show in page")}} 15
                                        </option>
                                        <option @if(request()->count == 25) selected
                                                @endif value="25">{{__("language.show in page")}} 25
                                        </option>
                                        <option @if(request()->count == 30) selected
                                                @endif value="30">{{__("language.show in page")}} 30
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </nav>
                    </form>

                    @if (count($products) > 0)
                        <div class="product-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            @foreach($products as $product)
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{route("site.product.details",$product->slug)}}">
                                                <img style="height: 250px; width: 250px" src="..\..\{{$product->image}}"
                                                     alt="{{$product->name}}"/>
                                            </a>
                                            @if ($product->price_sale)
                                                <div class="product-label-group">
                                                    <label class="product-label label-discount">{{$product->SalePercentage()}}</label>
                                                </div>
                                            @endif

                                            <div class="product-action-horizontal">
                                                @includeIf("site.layout.add-to-cart")
                                                @auth
                                                    <a onclick="storeItemIntoWishList({{$product->id}})"
                                                       class="btn-product-icon   btn-wishlist-product-{{$product->id}} @if($product->checkWishList() == true)  w-icon-heart-full @else w-icon-heart @endif "><span></span></a>

                                                    <a onclick="storeItemIntoCompareList({{$product->id}})"
                                                       class="btn-product-icon   btn-icon-left
                                                           btn-compare-product-{{$product->id}} @if($product->checkCompareList() == true)  w-icon-check-solid @else w-icon-compare @endif
                                                               "><span></span></a>
                                                @else
                                                    <a href="{{route("site.need-login")}}"
                                                       class="btn-product-icon w-icon-heart"><span></span></a>
                                                    <a href="{{route("site.need-login")}}"
                                                       class="btn-product-icon btn-icon-left w-icon-compare"><span></span></a>
                                                @endauth
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-name">
                                                <a href="{{route("site.product.details",$product->slug)}}">{{$product->name}}</a>
                                            </h3>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    @if ($product->price_sale)
                                                        {{$product->sale_cost}}
                                                        <strike> ( {{$product->cost}} ) </strike>
                                                    @else
                                                        {{$product->cost}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center"> {{__("language.noProductShow")}} , <span> <a
                                        href="{{route("site.home")}}">{{__("language.home")}}</a> </span></p>
                    @endif


                    <div class="toolbox toolbox-pagination justify-content-between">
                        <p class="showing-info mb-2 mb-sm-0">
                        </p>
                        {{$products->links()}}
                    </div>
                </div>
                <!-- End of Shop Main Content -->

            </div>
            <!-- End of Shop Content -->
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection
