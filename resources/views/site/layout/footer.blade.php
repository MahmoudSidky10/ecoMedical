<!-- Start of Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
<!-- End of Scroll Top -->
<!-- Start of Footer -->
<footer class="footer footer-dark appear-animate" data-animation-options="{'name': 'fadeIn'}">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">{{__("language.SubscribeToOurNewsletter")}}</h4>
                            <p class="text-white">{{__("language.GetSubscribeToOurNewsletter")}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="{{route("subscribe.store")}}" method="get"
                          class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email" required
                               placeholder="{{__("language.email")}}"/>
                        <button class="btn btn-dark btn-rounded" type="submit">{{__('language.Subscribe')}}<i
                                    class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="widget widget-about">
                        <a href="demo10.html" class="logo-footer">
                            <img src="assets/images/demos/demo10/footer-logo.png" alt="logo-footer" width="144"
                                 height="45"/>
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-desc">مؤسسة سعودية رائدة في المجال الطبي تأسست عام 2002 مقرها الرياض الفرع الرئيسي في الضباب نقوم بتوفير المستلزمات الطبية وجميع ما يحتاجه المرضى، هدفنا رضا عميلنا فنحن نسعى لتوفير أفضل المنتجات وأجودها</p>

                            <div class="social-icons social-icons-colored">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="#">Team Member</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="#">Affilate</a></li>
                            <li><a href="#">Order History</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="cart.html">View Cart</a></li>
                            <li><a href="login.html">Sign In</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="wishlist.html">My Wishlist</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">جميع حقوق الطبع والنشر محفوظة لدى مؤسسة أنوار غرناطة</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="assets/images/payment.png" alt="payment" width="159" height="25"/>
                </figure>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->