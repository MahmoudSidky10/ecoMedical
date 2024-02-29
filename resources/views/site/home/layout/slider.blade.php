<!-- Slider -->
<div class="  owl-carousel owl-theme owl-nav-inner owl-dot-inner owl-nav-lg row gutter-no cols-1 animation-slider"
     data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'autoplay': true,
                    'items': 1,
                    'responsive': {
                        '1500': {
                            'nav': true,
                            'dots': false
                        }
                    }
                }">

    @foreach($sliders as $slider)
        <div class="banner banner-fixed intro-slide intro-slide1"
             style="background-image: url({{$slider->image}});background-color: #F7F8FA;">
            <div class="container">
                <div class="banner-content y-50 d-inline-block">
                    <div class="slide-animate" data-animation-options="{
                                    'name': 'flipInY', 'duration': '1s'
                                }">

                        <h3 class="banner-title text-capitalize font-weight-normal ls-25">
                            {{$slider->name}}
                        </h3>

                        <a href="{{$slider->link}}"
                           class="btn btn-dark btn-outline btn-rounded btn_icon_rotate btn-icon-right">
                            {{__("language.discoverNow")}} <i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
