<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Ecommerce Dashboard | Login Page </title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{url('assets/admin/css/pages/login/login-2.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/css/style.bundle.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/media/logos/favicon.ico')}}" rel="stylesheet">

</head>
<body id="kt_body"
      class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
<div class="d-flex flex-column flex-root">
    <div
            class="login login-2 login-signin-on d-flex flex-column flex-column-fluid bg-white position-relative overflow-hidden"
            id="kt_login">
        <div class="login-header py-10 flex-column-auto">
            <div
                    class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
                <a href="#" class="flex-column-auto py-5 py-md-0">
                    <img src="{{asset('assets/front/images/logo.svg')}}" alt="logo" class="h-50px"/>

                </a>
            </div>
        </div>
        <div class="login-body d-flex flex-column-fluid align-items-stretch justify-content-center">
            <div class="container row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="login-form login-signin">
                        <form class="form w-xxl-550px rounded-lg p-20" novalidate="novalidate"
                              method="POST" action="{{ url('admin-login') }}">
                            @csrf


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('danger'))
                                <div class="alert alert-danger"
                                     style="font-weight: bold"> {{ Session::get('danger') }}</div>
                            @endif

                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to
                                    Ecommerce Dashboard</h3>
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                <input class="form-control form-control-solid h-auto p-6 rounded-lg" type="text"
                                       name="email" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                </div>
                                <input class="form-control form-control-solid h-auto p-6 rounded-lg" type="password"
                                       name="password" autocomplete="off"/>
                            </div>
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_signin_submit"
                                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 col-md-12 py-4 my-3 mr-">
                                    Sign
                                    In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div
                        class="col-lg-6 bgi-size-contain bgi-no-repeat bgi-position-y-center bgi-position-x-center min-h-150px mt-10 m-md-0"
                        style="background-image: url({{url('assets/admin/media/svg/illustrations/accomplishment.svg')}})"></div>
            </div>
        </div>
    </div>
</div>
<script src="{{url('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{url('assets/admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{url('assets/admin/js/scripts.bundle.js')}}"></script>
<script src="{{url('assets/admin/js/pages/custom/login/login.js')}}"></script>
</body>
</html>
