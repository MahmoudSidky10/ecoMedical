@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')
    {{--    address --}}
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.profile")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->
        <!-- Start of PageContent -->
        <div class="page-content pt-2 mt-3">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        @includeIf("site.user.side-bar",["page" => "editProfile"])
                    </ul>
                    <div class="tab-content mb-6">

                        <div class="tab-pane active in">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">{{__("language.profile_details")}}</h4>
                                </div>
                            </div>
                            @includeIf("site.layout.alert")
                            <form class="form account-details-form mt-3" action="{{route("user.editProfile.update")}}"
                                  method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="display-name"> {{__("language.name")}} *</label>
                                    <input type="text" id="name" name="name" value="{{$user->name}}"
                                           class="form-control form-control-md mb-0">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="mobile">{{__("language.mobile")}} *</label>
                                    <input type="tel" id="mobile" name="mobile" value="{{$user->mobile}}"
                                           class="form-control form-control-md">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email">{{__("language.email")}} </label>
                                    <input type="email" id="email" name="email" value="{{$user->email}}"
                                           class="form-control form-control-md">
                                </div>


                                <button type="submit"
                                        class="btn btn-dark btn-rounded btn-sm mb-4">{{__("language.save")}}</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection