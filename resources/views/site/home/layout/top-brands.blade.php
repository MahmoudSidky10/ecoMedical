@if(count($brands) > 0)
    <h2 class=" container title mb-5 appear-animate"> {{__("language.topSellingBrands")}}</h2>
    <div class="container owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1 mb-10 pb-2 appear-animate"
         data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                }">
        @foreach($brands as $brand)
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-2">
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="#">
                                <img src="{{$brand->image}}" alt="{{$brand->name}}"
                                     style="max-height: 70px; max-width: 70px"/>
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="#">{{$brand->name}}</a>
                            </h4>
                            <span class="vendor-product-count">( {{count($brand->products)}} {{__("language.product")}} )</span>
                        </div>
                    </div>
                    <div class="vendor-products row cols-3 gutter-sm">
                        @foreach($brand->productList(3) as $brandProduct)
                            <div class="vendor-product">
                                <figure class="product-media">
                                    <a href="{{route("site.product.details",$brandProduct->slug)}}">
                                        <img src="{{$brandProduct->image}}" alt="Vendor Product" width="81"
                                             height="92"/>
                                    </a>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endif