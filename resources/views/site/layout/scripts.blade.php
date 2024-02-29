<!-- Plugin JS File -->

<script src="{{asset("/assets/site/vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/floating-parallax/parallax.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/jquery.plugin/jquery.plugin.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/imagesloaded/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/isotope/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/sticky/sticky.js")}}"></script>
<script src="{{asset("/assets/site/vendor/owl-carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/jquery.countdown/jquery.countdown.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/magnific-popup/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("/assets/site/vendor/zoom/jquery.zoom.js")}}"></script>
<script src="{{asset("/assets/site/vendor/photoswipe/photoswipe.js")}}"></script>
<script src="{{asset("/assets/site/vendor/photoswipe/photoswipe-ui-default.js")}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Main JS -->
<script src="{{asset("/assets/site/js/main.min.js")}}"></script>
<script>

     $('#main-menu_taB').click(function(e){
         $(this).addClass('active');
         $('#main-menu').addClass('active');
         $('#categories').removeClass('active');
         $('#categories_taB').removeClass('active');
     });
     $('#categories_taB').click(function(e){
         $(this).addClass('active');
         $('#categories').addClass('active');
         $('#main-menu').removeClass('active');
         $('#main-menu_taB').removeClass('active');
     });
</script>
@yield("js")

