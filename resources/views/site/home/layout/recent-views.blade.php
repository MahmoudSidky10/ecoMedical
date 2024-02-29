<!-- Your Recent Views -->
@if(auth()->check() and count(\App\Models\ProductView::where("user_id",auth()->user()->id)->orderBy("id","desc")->take(8)->get()) > 0 )
    <div class="container">

        <h2 class="title title-underline mb-4 ls-normal appear-animate fadeIn appear-animation-visible"
            style="animation-duration: 1.2s;">{{__("language.yourRecentViews")}}</h2>

        <div class="row cols-lg-4 cols-md-4 cols-xs-2 cols-1 appear-animate">
            @foreach(\App\Models\ProductView::where("user_id",auth()->user()->id)->orderBy("created_at","desc")->take(8)->get()->unique("product_id") as $product)
                @php $product = $product->product ; @endphp
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