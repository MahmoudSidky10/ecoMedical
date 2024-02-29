@if(count($brands) > 0 )
    <div class="grey-section pt-10 pb-5">
        <div class="container mt-2">
            <h2 class="title mb-5 appear-animate">{{__("language.ourBrands")}}</h2>
            <div class="owl-carousel owl-theme brands-wrapper br-sm mb-10 appear-animate owl-loaded owl-drag fadeIn appear-animation-visible"
                 data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'autoplay': true,
                    'autoplayTimeout': 4000,
                    'loop': true,
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
                            'items': 6
                        },
                        '1200': {
                            'items': 8
                        }
                    }
                }" style="animation-duration: 1.2s;">


                <div class="owl-stage-outer">
                    <div class="owl-stage"
                         style="transform: translate3d(-1722px, 0px, 0px); transition: all 1s ease 0s; width: 4134px;">
                        @foreach($brands as $brand)
                            <div class="owl-item cloned" style="width: 152.25px; margin-right: 20px;">
                                <figure>
                                    <img src="{{$brand->image}}" alt="Brand" width="290" height="100">
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif