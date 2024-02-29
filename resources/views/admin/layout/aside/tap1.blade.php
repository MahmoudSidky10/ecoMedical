<div class="customLogo text-center">
    <a href="{{url("/admin/dash")}}">
        <img style="width: 100px" alt="Logo" src="../{{\App\Models\Setting::first()->app_logo}}"/>
    </a>
</div>
<li class="menu-section">
    <h4 class="menu-text">{{__("language.dashboard")}}</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>


<li class="menu-item @if(strpos(url()->current(), "dash" )) menu-item-active @endif  " aria-haspopup="true"
    data-menu-toggle="hover">
    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/dash" , "title" => trans('language.dashboard') , "icon" => "menu-icon fas fa-tachometer-alt" ])
</li>

<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/clients" )) menu-item-active menu-item-open  @endif "
        aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
            </g>
        </svg><!--end::Svg Icon--></span>
            <span class="menu-text">{{__("language.customers")}}</span>
            <em class="menu-arrow"></em>
        </a>
        <div class="menu-submenu">
            <em class="menu-arrow"></em>
            <ul class="menu-subnav">

                <li class="menu-item  "
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/clients" , "title" => trans('language.show_clients') , "icon" => "menu-icon fas fa-users-cog" ])
                </li>

                <li class="menu-item  "
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/clients/create" , "title" => trans('language.add_new_client') , "icon" => "menu-icon fas fa-user-plus" ])
                </li>


{{--                    <li class="menu-item @if(strpos(url()->current(), "admin/roles" )) menu-item-active @endif  "--}}
{{--                        aria-haspopup="true"--}}
{{--                        data-menu-toggle="hover">--}}
{{--                        @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/roles" , "title" => trans('language.roles') , "icon" => "menu-icon fas fa-user-friends" ])--}}
{{--                    </li>--}}

{{--                    <li class="menu-item @if(strpos(url()->current(), "admin/permission-categories" )) menu-item-active @endif  "--}}
{{--                        aria-haspopup="true"--}}
{{--                        data-menu-toggle="hover">--}}
{{--                        @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/permission-categories" , "title" => trans('language.permission-categories') , "icon" => "menu-icon fas fa-clipboard-list" ])--}}
{{--                    </li>--}}



{{--                    <li class="menu-item @if(strpos(url()->current(), "admin/permissions" )) menu-item-active @endif  "--}}
{{--                        aria-haspopup="true"--}}
{{--                        data-menu-toggle="hover">--}}
{{--                        @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/permissions" , "title" => trans('language.permissions') , "icon" => "menu-icon fas fa-tasks" ])--}}
{{--                    </li>--}}



            </ul>
        </div>
    </li>

<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/categories" ) || strpos(url()->current(), "/brands" )) menu-item-active menu-item-open  @endif "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Home\Commode2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3"/>
                <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000"/>
            </g>
        </svg><!--end::Svg Icon--></span>

        <span class="menu-text">{{__("language.categories")}}</span>
        <em class="menu-arrow"></em>
    </a>
    <div class="menu-submenu">
        <em class="menu-arrow"></em>
        <ul class="menu-subnav">


                <li class="menu-item" aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/categories/create" , "title" => trans('language.add_category') , "icon" => "menu-icon far fa-plus-square" ])
                </li>

                <li class="menu-item " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/categories" , "title" => trans('language.show_categories') , "icon" => "menu-icon fas fa-cogs" ])
                </li>

                <li class="menu-item " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/home-sections" , "title" => trans('language.home-sections') , "icon" => "menu-icon flaticon-layers" ])
                </li>


{{--                    <li class="menu-item @if(strpos(url()->current(), "brands" )) menu-item-active @endif"--}}
{{--                        aria-haspopup="true"--}}
{{--                        data-menu-toggle="hover">--}}
{{--                        @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/brands" , "title" => trans('language.brands') , "icon" => "menu-icon fas fa-tools" ])--}}
{{--                    </li>--}}




        </ul>
    </div>
</li>


<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/products" ) || strpos(url()->current(), "/ProductProperties" )) menu-item-active menu-item-open  @endif "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Shopping\Box3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3"/>
                <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"/>
            </g>
        </svg><!--end::Svg Icon--></span>

        <span class="menu-text">{{__("language.show_products")}}</span>
        <em class="menu-arrow"></em>
    </a>
    <div class="menu-submenu">
        <em class="menu-arrow"></em>
        <ul class="menu-subnav">

            <li class="menu-item" aria-haspopup="true"
                data-menu-toggle="hover">
                @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/products/create" , "title" => trans('language.add_product') , "icon" => "menu-icon fas fa-cart-plus" ])
            </li>


                <li class="menu-item @if(strpos(url()->current(), "/products" )) menu-item-active @endif  "
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/products" , "title" => trans('language.products') , "icon" => "menu-icon fas fa-edit" ])
                </li>



{{--                <li class="menu-item @if(strpos(url()->current(), "/ProductProperties" )) menu-item-active @endif  "--}}
{{--                    aria-haspopup="true"--}}
{{--                    data-menu-toggle="hover">--}}
{{--                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/ProductProperties" , "title" => trans('language.ProductProperties') , "icon" => "menu-icon fas fa-cog" ])--}}
{{--                </li>--}}


            <li class="menu-item"
                aria-haspopup="true"
                data-menu-toggle="hover">
                @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/coupons" , "title" => trans('language.coupons') , "icon" => "menu-icon fas fa-percent" ])
            </li>


        </ul>
    </div>
</li>


<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/orders" )) menu-item-active menu-item-open  @endif "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
            </g>
        </svg><!--end::Svg Icon--></span>
        <span class="menu-text">{{__("language.orders")}}</span>
        <em class="menu-arrow"></em>
    </a>
    <div class="menu-submenu">
        <em class="menu-arrow"></em>
        <ul class="menu-subnav">


                <li class="menu-item  " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/orders" , "title" => trans('language.show_orders') , "icon" => "menu-icon fas fa-wrench" ])
                </li>



                <li class="menu-item  " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/orders?status=".\App\Models\Order::Done , "title" => trans('language.new_orders') , "icon" => "menu-icon fas fa-eye" ])
                </li>


        </ul>
    </div>
</li>

<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/countries" ) || strpos(url()->current(), "/governorates" ) ) menu-item-active menu-item-open  @endif "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Map\Marker1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
            </g>
        </svg><!--end::Svg Icon--></span>

        <span class="menu-text">{{__("language.places")}}</span>
        <em class="menu-arrow"></em>
    </a>
    <div class="menu-submenu">
        <em class="menu-arrow"></em>
        <ul class="menu-subnav">


                <li class="menu-item " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/countries" , "title" => trans('language.countries') , "icon" => "menu-icon fas fa-globe-africa" ])
                </li>



                <li class="menu-item " aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/governorates" , "title" => trans('language.governorates') , "icon" => "menu-icon fab fa-font-awesome-flag" ])
                </li>


        </ul>
    </div>
</li>
<li class="menu-item menu-item-submenu @if(strpos(url()->current(), "/settings" ) || strpos(url()->current(), "/socialMedia" ) || strpos(url()->current(), "/sliders" ) || strpos(url()->current(), "/designs" )  ) menu-item-active menu-item-open  @endif "
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Tools\Tools.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
            </g>
        </svg><!--end::Svg Icon--></span>

        <span class="menu-text">{{__("language.show_settings")}}</span>
        <em class="menu-arrow"></em>
    </a>
    <div class="menu-submenu">
        <em class="menu-arrow"></em>
        <ul class="menu-subnav">


                <li class="menu-item "
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/settings" , "title" => trans('language.settings') , "icon" => "menu-icon fas fa-cog" ])
                </li>



                <li class="menu-item"
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/socialMedia" , "title" => trans('language.socialMedia') , "icon" => "menu-icon fas fa-hashtag" ])
                </li>



                <li class="menu-item "
                    aria-haspopup="true"
                    data-menu-toggle="hover">
                    @includeIf("admin.layout.aside.main-item" ,["href"=>"/admin/sliders" , "title" => trans('language.sliders') , "icon" => "menu-icon fab fa-adversal" ])
                </li>


        </ul>
    </div>
</li>



