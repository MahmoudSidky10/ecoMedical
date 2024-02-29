@extends('admin.layout.index')
@section('content')
    @include("admin.layout.nav",["title" => trans('language.dashboard')])

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">

                    </div>
                    <!--end::Container-->
                </div>
            </div>
        </div>
    </div>

@endsection
