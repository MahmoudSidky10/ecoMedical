<!DOCTYPE html>
<html @if(App::isLocale('ar')) direction="rtl" dir="rtl" style="direction: rtl" @endif >
@includeIf("admin.layout.head")
<body id="kt_body"
      class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
@includeIf("admin.layout.header")
@includeIf("admin.layout.aside.index")
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

    <!--begin::Subheader-->
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div style="width:80%" class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="w-100 d-flex align-items-baseline flex-wrap mr-5">
                    <!-- <div style="padding-left: 34px;" class="nav_logo arrow_dis_non">
                        <img src="assets/media/fatora_img/logo_black.png" alt="">
                    </div> -->
{{--                    <div class="contain_menue_icons">--}}
{{--                        <span id="open_Bar" class="d-none svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Text\Menu.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>--}}
{{--                                <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"/>--}}
{{--                            </g>--}}
{{--                        </svg><!--end::Svg Icon--></span>--}}

{{--                        <span id="close_Bar" class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Navigation\Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">--}}
{{--                                    <rect x="0" y="7" width="16" height="2" rx="1"/>--}}
{{--                                    <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg><!--end::Svg Icon--></span>--}}
{{--                    </div>--}}
                    <h5 style="margin-right:40%;" class="text-center text-dark font-weight-bold my-1 mr-5">اهلا وسهلا بك في لوحه التحكم</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap top_four_icon">

                <!-- languge dropdown -->
{{--                <div class="dropdown dropdown-inline">--}}
{{--                    <a href="#"--}}
{{--                       class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1 mr-3"--}}
{{--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--											<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Text\Align-auto.svg--><svg--}}
{{--                                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"--}}
{{--                                                        height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<rect x="0" y="0" width="24" height="24"/>--}}
{{--													<path d="M9.61764706,5 L8.73529412,7 L3,7 C2.44771525,7 2,6.55228475 2,6 C2,5.44771525 2.44771525,5 3,5 L9.61764706,5 Z M14.3823529,5 L21,5 C21.5522847,5 22,5.44771525 22,6 C22,6.55228475 21.5522847,7 21,7 L15.2647059,7 L14.3823529,5 Z M6.08823529,13 L5.20588235,15 L3,15 C2.44771525,15 2,14.5522847 2,14 C2,13.4477153 2.44771525,13 3,13 L6.08823529,13 Z M17.9117647,13 L21,13 C21.5522847,13 22,13.4477153 22,14 C22,14.5522847 21.5522847,15 21,15 L18.7941176,15 L17.9117647,13 Z M7.85294118,9 L6.97058824,11 L3,11 C2.44771525,11 2,10.5522847 2,10 C2,9.44771525 2.44771525,9 3,9 L7.85294118,9 Z M16.1470588,9 L21,9 C21.5522847,9 22,9.44771525 22,10 C22,10.5522847 21.5522847,11 21,11 L17.0294118,11 L16.1470588,9 Z M4.32352941,17 L3.44117647,19 L3,19 C2.44771525,19 2,18.5522847 2,18 C2,17.4477153 2.44771525,17 3,17 L4.32352941,17 Z M19.6764706,17 L21,17 C21.5522847,17 22,17.4477153 22,18 C22,18.5522847 21.5522847,19 21,19 L20.5588235,19 L19.6764706,17 Z"--}}
{{--                                                          fill="#000000" opacity="0.3"/>--}}
{{--													<path d="M11.044,5.256 L13.006,5.256 L18.5,19 L16,19 L14.716,15.084 L9.19,15.084 L7.5,19 L5,19 L11.044,5.256 Z M13.924,13.14 L11.962,7.956 L9.964,13.14 L13.924,13.14 Z"--}}
{{--                                                          fill="#000000"/>--}}
{{--												</g>--}}
{{--											</svg><!--end::Svg Icon--></span>--}}

{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right p-0 m-0">--}}
{{--                        <!--begin::Navigation-->--}}
{{--                        <ul class="navi navi-hover">--}}

{{--                            <li class="navi-item">--}}
{{--                                <a href="{{ url("".url()->current()."?&lang=ar") }}" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Text\Align-right.svg--><svg--}}
{{--                                                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                                                                        width="24px" height="24px" viewBox="0 0 24 24"--}}
{{--                                                                        version="1.1">--}}
{{--																<g stroke="none" stroke-width="1" fill="none"--}}
{{--                                                                   fill-rule="evenodd">--}}
{{--																	<rect x="0" y="0" width="24" height="24"/>--}}
{{--																	<path d="M5,5 L19,5 C19.5522847,5 20,5.44771525 20,6 C20,6.55228475 19.5522847,7 19,7 L5,7 C4.44771525,7 4,6.55228475 4,6 C4,5.44771525 4.44771525,5 5,5 Z M5,13 L19,13 C19.5522847,13 20,13.4477153 20,14 C20,14.5522847 19.5522847,15 19,15 L5,15 C4.44771525,15 4,14.5522847 4,14 C4,13.4477153 4.44771525,13 5,13 Z"--}}
{{--                                                                          fill="#000000" opacity="0.3"/>--}}
{{--																	<path d="M11,9 L19,9 C19.5522847,9 20,9.44771525 20,10 C20,10.5522847 19.5522847,11 19,11 L11,11 C10.4477153,11 10,10.5522847 10,10 C10,9.44771525 10.4477153,9 11,9 Z M11,17 L19,17 C19.5522847,17 20,17.4477153 20,18 C20,18.5522847 19.5522847,19 19,19 L11,19 C10.4477153,19 10,18.5522847 10,18 C10,17.4477153 10.4477153,17 11,17 Z"--}}
{{--                                                                          fill="#000000"/>--}}
{{--																</g>--}}
{{--															</svg><!--end::Svg Icon--></span>--}}
{{--														</span>--}}
{{--                                    <span class="navi-text">عربي</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="navi-item">--}}
{{--                                <a href="{{ url("".url()->current()."?&lang=en") }}" class="navi-link">--}}
{{--														<span class="navi-icon">--}}
{{--															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\keen\theme\demo5\dist/../src/media/svg/icons\Text\Align-left.svg--><svg--}}
{{--                                                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                                                                        width="24px" height="24px" viewBox="0 0 24 24"--}}
{{--                                                                        version="1.1">--}}
{{--																<g stroke="none" stroke-width="1" fill="none"--}}
{{--                                                                   fill-rule="evenodd">--}}
{{--																	<rect x="0" y="0" width="24" height="24"/>--}}
{{--																	<rect fill="#000000" opacity="0.3" x="4" y="5"--}}
{{--                                                                          width="16" height="2" rx="1"/>--}}
{{--																	<rect fill="#000000" opacity="0.3" x="4" y="13"--}}
{{--                                                                          width="16" height="2" rx="1"/>--}}
{{--																	<path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z"--}}
{{--                                                                          fill="#000000"/>--}}
{{--																</g>--}}
{{--															</svg><!--end::Svg Icon--></span>--}}
{{--														</span>--}}
{{--                                    <span class="navi-text">english</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <!--end::Navigation-->--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- log out link -->
                <a href="javascript:void(0);" class="btn btn-icon btn-icon-white btn-hover-transparent-white w-40px h-40px"
                    id="kt_quick_user_togl" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="User Profile">
                    <div class="symbol symbol-30 bg-gray-100">
                        <div class="symbol-label">
                            <img alt="Logo" src="../{{\App\Models\Setting::first()->app_logo}}"
                                class="h-75 align-self-end"/>
                        </div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                </a>
                <!-- pops -->
                <div id="kt_quick_user_tog" class="offcanvas offcanvas-left p-10">
                    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                        <h3 class="font-weight-bold m-0">{{__("language.user_details")}}</h3>
                        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close_tog">
                            <i class="ki ki-close icon-xs text-muted"></i>
                        </a>
                    </div>
                    <div class="offcanvas-content pr-5 mr-n5">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center mt-5">
                            <div class="symbol symbol-100 mr-5">
                                <img class="symbol-label" src="../{{\App\Models\Setting::first()->app_logo}}" />
                                <i class="symbol-badge bg-success"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#"
                                class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->name}}</a>
                                <div class="navi mt-1">
                                    <a href="#" class="navi-item">
                                        <span class="navi-link p-0 pb-2">
                                            <span class="navi-icon mr-1">
                                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                                    fill="#000000"/>
                                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <span class="navi-text text-muted text-hover-primary">{{Auth::user()->email}}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="navi navi-spacer-x-0 p-0">
                            <span class="navi-item mt-2">
                                <span class="navi-link">
                                    <a href="{{url("/admin/logout")}}"
                                    class="btn btn-sm btn-light-primary font-weight-bolder py-3 px-6">{{__("language.logout")}}</a>
                                </span>
                            </span>
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                    </div>
                </div>
                
                <!-- <a href="{{route("logout")}}">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                <rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="10"
                                        rx="1"/>
                            </g>
                        </svg>
                    </span>
                </a> -->


            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_header" class="header header-fixed">
        </div>
        @yield("content")
    </div>
</div>
@includeIf("admin.layout.footer")
@include('sweetalert::alert')
@includeIf("admin.components.modals.delete-modal")
@includeIf("admin.layout.scripts")

</body>
</html>
