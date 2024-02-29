@extends('site.layout.index')
@section('body-class',"my-account")
@section('content')
    {{--    address --}}
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{__("language.address")}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->
        <!-- Start of PageContent -->
        <div class="page-content pt-2 mt-3">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        @includeIf("site.user.side-bar",["page" => "address"])
                    </ul>
                    <div class="tab-content mb-6">

                        <div class="tab-pane active in">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span>
                                    <i class="w-icon-map-marker"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">{{__("language.add")}}</h4>
                                </div>
                            </div>
                            @includeIf("site.layout.alert")
                            <form class="form account-details-form mt-3" action="{{route("user.address.store")}}"
                                  method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="country_id"> {{__("language.country")}} *</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        @foreach(\App\Models\Country::all() as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="governorate_id"> {{__("language.governorate")}} *</label>
                                    <select class="form-control" name="governorate_id" id="governorate_id">
                                        @foreach(\App\Models\Governorate::all() as $governorate)
                                            <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3"><label for="street"> {{__("language.address")}} </label>
                                    <input type="text"
                                           placeholder="ahmed samir st.."
                                           id="street"
                                           name="street"
                                           value=""
                                           class="form-control form-control-md mb-0">
                                </div>

                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">حفظ</button>
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
@section('js')
    <script>
        $('#country_id').on('change', function () {
            var country_id = $('#country_id').val();
            $.post("{{url("/getCities")}}",
                {
                    country_id: country_id,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {

                    if (data.status == true) {
                        $('#governorate_id').html('');
                        if (data.status == true) {
                            $("#governorate_id").prepend('' +
                                '<option  value="0"> اختر محافظة</option>');
                        }
                        $.each(data, function () {
                            $.each(this, function (index, item) {
                                console.log(item);
                                $("#governorate_id").prepend('' +
                                    '<option  value="' + item.id + '">' + item.name + '</option>');
                            });
                        });
                    } else {
                        $('#governorate_id').html('');
                        $("#governorate_id").prepend('' +
                            '<option name="sub_category_id"  value="0">لا توجد بيانات </option>');
                    }
                });
        });
    </script>
@endsection