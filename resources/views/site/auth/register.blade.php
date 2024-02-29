@extends('site.layout.index')
@section('body-class',"")
@section('content')
    <!-- Start of Main -->
    <main class="main login-page">

        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a href="{{route("login")}}"
                                   class="nav-link ">{{__("language.login")}}</a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{route("site.register.view")}}"
                                   class="nav-link active   ">{{__("language.register")}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @includeIf("site.layout.alert")
                            <form action="{{route("site.register")}}" method="post">
                                @csrf
                                <div class="tab-pane active">

                                    <div class="form-group mb-5">
                                        <label>{{__("language.name")}} *</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>{{__("language.mobile")}} *</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__("language.email")}} *</label>
                                        <input type="email" class="form-control" name="email" id="username">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>{{__("language.password")}} *</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                               required>
                                    </div>

                                    <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                        <input type="checkbox" class="custom-checkbox" id="privacy" name="privacy"
                                               required="">
                                        <label for="privacy" class="font-size-md">{{__("language.agree_for")}}<a
                                                    href="#"
                                                    class="text-primary font-size-md"> {{__("language.terms")}}
                                                 </a></label>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <a href="{{route("login")}}">{{__("language.doYouHaveAccount")}}  </a>
                                    </div>
                                    <div class="form-group mb-0 text-center ">
                                        <button type="submit"
                                                class=" full-width btn btn-primary">{{__("language.register")}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection