<!-- Top Categories -->
<h2 class="container title mb-5 appear-animate">{{__("language.mainCategories")}} </h2>
<div class="container owl-carousel owl-theme owl-shadow-carousel category-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 appear-animate"
     data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        },
                        '1200': {
                            'items': 6
                        }
                    }
                }">
    @foreach($topCategories as $category)
        <div class="category">
            <figure class="category-media">
                <a href="{{route("site.category-products",[$category->id ,$category->slug])}}">
                    <img src="{{$category->image}}" alt="{{$category->name}}"  style="background-color: #5C92C0; height: 250px; width: 200px"/>
                </a>
            </figure>
            <div class="category-content">
                <h4 class="category-name">
                    <a href="{{route("site.category-products",[$category->id ,$category->slug])}}">{{$category->name}}</a>
                </h4>
            </div>
        </div>
    @endforeach

</div>
