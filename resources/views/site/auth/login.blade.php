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
                                   class="nav-link active">{{__("language.login")}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("site.register.view")}}"
                                   class="nav-link">{{__("language.register")}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @includeIf("site.layout.alert")
                            <form action="{{route("site.login")}}" method="post">
                                @csrf
                                <div class="tab-pane active">
                                    <div class="form-group">
                                        <label>{{__("language.mobile")}}</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>{{__("language.password")}} *</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                               required>
                                    </div>
                                    <div class="form-group mb-0 text-center mt-5 ">
                                        <button type="submit"
                                                class=" full-width btn btn-primary">{{__("language.login")}}</button>
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