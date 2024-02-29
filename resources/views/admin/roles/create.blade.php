@extends('admin.layout.forms.add.index')
@section('action' , "roles")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/roles")}}">  {{trans('language.roles')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "roles")
@section('page-title',trans('language.roles'))
@section('form-groups')

    <div class="main">
        <div class="admin non-hover">
            <div class="col-12 col-md-12">
                <div class="content">
                    @includeIf("admin.layout.alert")

                    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-plus','label' => trans('language.name_ar'),'name'=>'title_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
                    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-plus','label' => trans('language.name_en'),'name'=>'title_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])



                    <div class="form-group"> <div class="form-group">
                            <div class="col-3">
                                <label for="record_state">Status:</label>
                                <span class="switch switch-lg switch-icon">
                                     <label>
                                     <input id="record_state" type="checkbox" checked
                                            name="record_state"><span></span>
                                     </label>
                                </span>
                            </div>
                        </div>
                        <label>{{ __('language.roles') }} (حيث يمكنك اختار دور فيتم تحديد صلاحياته بشكل مباشر
                            .)</label>
                        <select onchange="getSelectedCheck()" id="role_id" class="form-control" name="role_id">
                            <option value="0">{{__("language.roles")}}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="checkbBoxes">
                        <div class="form-group">
                            <br>
                            <label class="required" for="permissions">{{ __('language.permissions') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                      style="border-radius: 0">{{ __('language.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all"
                                      style="border-radius: 0">{{ __('language.deselect_all') }}</span>
                            </div>
                            @foreach($permissionCategories as $category)
                                <h2>{{$category->name}}</h2>
                                <hr>
                                <div class="checkbox-inline">
                                    @foreach($category->permissions as $permission)

                                        <label class="checkbox" for="ch_{{$permission->id}}">
                                            <input id="ch_{{$permission->id}}" type="checkbox" name="permissions[]"
                                                   value="{{$permission->id}}"
                                                   class="rolecheckbox ">
                                            <span></span>{{$permission->name ? $permission->name : $permission->title}}
                                        </label>

                                    @endforeach

                                    @if($errors->has('permissions'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('permissions') }}
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('submit-button-title' , trans('language.add'))
@section("css")
    <style>
        .checkbox {
            margin: 5px;
        }
    </style>
@endsection
@section("js")
    <script>
        $(".select-all").click(function () {
            $(".rolecheckbox").prop('checked', true);
        });

        $(".deselect-all").click(function () {
            $(".rolecheckbox").prop('checked', false);
        });

        function getSelectedCheck() {
            let role_id = $("#role_id").val();
            $.post("{{url("/admin/get-selected-check")}}",
                {
                    role_id: role_id,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {
                    $("#checkbBoxes").html(data.html)
                });

        }

    </script>
@endsection
