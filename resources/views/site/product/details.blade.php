@extends('site.layout.index')
@section('body-class',"home")
@section('content')

    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{route("site.home")}}">{{__("language.home")}}</a></li>
                <li>
                    <a href="{{route("site.category-products",[$item->category_id,$item->category->slug])}}"> {{$item->category->name}} </a>
                </li>
                <li> {{$item->name}} </li>
            </ul>
            <ul class="product-nav list-style-none">
                @if (@$prev)
                    <li class="product-nav-prev">
                        <a href="{{route("site.product.details",$prev->slug)}}">
                            <i class="w-icon-angle-left"></i>
                        </a>
                        <span class="product-nav-popup">
                            <img src="../{{$prev->image}}" alt="Product" width="110"
                                 height="110"/>
                            <span class="product-name">{{$prev->name}}</span>
                        </span>
                    </li>
                @endif
                @if (@$next)
                    <li class="product-nav-next">
                        <a href="{{route("site.product.details",$next->slug)}}">
                            <i class="w-icon-angle-right"></i>
                        </a>
                        <span class="product-nav-popup">
                            <img src="../{{$next->image}}" alt="Product" width="110"
                                 height="110"/>
                            <span class="product-name">{{$next->name}}</span>
                        </span>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        @foreach($item->images as $img)
                                            <figure class="product-image">
                                                <img src="../{{$img->image}}"
                                                     data-zoom-image="../{{$img->image}}"
                                                     alt="{{$item->name}}" width="800" height="900">
                                            </figure>
                                        @endforeach
                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs row cols-4 gutter-sm">
                                            @foreach($item->images as $img)
                                                <div class="product-thumb @if($loop->first) active @endif">
                                                    <img src="../{{$img->image}}"
                                                         alt="{{$item->name}}" width="800" height="900">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                        <button class="thumb-down disabled"><i
                                                    class="w-icon-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h2 class="product-title">{{$item->name}}</h2>
                                    <div class="product-bm-wrapper">
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                {{__("language.category")}} :
                                                <span class="product-category ">     {{@$item->category_name}}</span>
                                            </div>
                                            @if ($item->model_number)
                                                <div class="product-sku">
                                                    {{__("language.SKU")}} : <span> {{$item->model_number}}</span>
                                                </div>
                                            @endif

                                            <div class="product-sku pt-2 ">
                                                {{__("حالة الضريبة")}} :
                                                <span> {!! $item->is_vat_included == 1 ? "المنتج شامل الضريبة"  : "المنتج غير شامل الضريبة" !!}</span>
                                            </div>

                                            <div class="product-sku pt-2">
                                                {{__("language.stock_quantity")}} :
                                                <span> @if($item->stock_quantity != 0 )
                                                        {{$item->stock_quantity}}
                                                    @else
                                                        <label style="color: darkred;background-color: darkred;border-radius: 10px;color: #F7F8FA;padding: 0 5px">  منتهي من الخزن  </label>
                                                    @endif</span>
                                            </div>

                                            <div class="product-sku pt-2 ">
                                                {{__("حاله التوصيل")}} :
                                                @if($productPrice >= $setting->delivery_min_price)
                                                    <span>     {{__("شامل التوصيل")}} </span>
                                                @else
                                                    <span>     {{__("غير شامل التوصيل")}} </span>
                                                @endif

                                            </div>


                                            <div class="  " style="padding-top: 15px">
                                                <div class="product-link-wrapper d-flex">
                                                    @auth
                                                        @include("site.layout.add-to-cart" , ['product' => $item])

                                                        <a onclick="storeItemIntoWishList({{$item->id}})"
                                                           style="margin:  0 10px"
                                                           class="btn-product-icon btn-wishlist btn-wishlist-product-{{$item->id}} @if($item->checkWishList() == true)  w-icon-heart-full @else w-icon-heart @endif "><span></span></a>

                                                        <a onclick="storeItemIntoCompareList({{$item->id}})"
                                                           class="btn-product-icon  btn-wishlist btn-icon-left
                                                           btn-compare-product-{{$item->id}} @if($item->checkCompareList() == true)  w-icon-check-solid @else w-icon-compare @endif
                                                                   "><span></span></a>
                                                    @else
                                                        <a href="{{route("site.need-login")}}"
                                                           class="btn-product-icon w-icon-heart"><span></span></a>
                                                        <a href="{{route("site.need-login")}}"
                                                           class="btn-product-icon btn-icon-left w-icon-compare"><span></span></a>
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <ins id="product-final-price" class="new-price">
                                            @if ($item->price_sale)
                                                {{$item->sale_cost}}
                                                <strike> ( {{$item->cost}} ) </strike>
                                            @else
                                                {{$item->cost}}
                                            @endif
                                        </ins>
                                    </div>

                                    <hr class="product-divider">

                                    <p inert>
                                        {{$item->description}}
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">{{__("language.similar_products")}}</h4>
                                    </div>

                                    <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">

                                        <div class="widget-col">
                                            @foreach($randProducts as $randProduct)
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="../{{$randProduct->image}}"
                                                                 alt="{{$randProduct->name}}" width="100" height="113"/>
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="{{route("site.product.details",$randProduct->slug)}}">{{$randProduct->name}}</a>
                                                        </h4>
                                                        <div class="product-price">
                                                            @if ($randProduct->price_sale)
                                                                {{$randProduct->sale_cost}}
                                                                <strike> ( {{$randProduct->cost}} ) </strike>
                                                            @else
                                                                {{$randProduct->cost}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection