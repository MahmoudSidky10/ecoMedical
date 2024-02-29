@if(count($item->section->latestTenProducts()) > 0)
    <div class="container">
        <h2 class="title title-underline mb-4 ls-normal appear-animate fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">{{$item->section->name}}</h2>

        <div class="row cols-lg-4 cols-md-3 cols-xs-2 cols-1 appear-animate">
            @foreach($item->section->latestTenProducts() as $product)
                <div class="owl-item active" style="width: 216.25px; margin-right: 20px;">
                    <div class="product-col">
                        <div class="product-wrap product text-center">
                            <figure class="product-media">
                                <a href="{{url("/product-details/$product->slug")}}">
                                    <img src="{{$product->image}}" alt="Product"
                                         width="216" height="243">
                                </a>
                                <div class="product-action-vertical">

                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a
                                            href="{{url("/product-details/$product->slug")}}">{{$product->name}}</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">
                                        @if ($product->price_sale)
                                            {{$product->sale_cost}}
                                            <strike> ( {{$product->cost}} ) </strike>
                                        @else
                                            {{$product->cost}}
                                        @endif
                                    </ins>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif