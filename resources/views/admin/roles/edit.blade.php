@extends('admin.layout.forms.edit.index')
@section('action' , "roles/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/roles")}}">  {{trans('language.roles')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
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
                    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-plus','label' => trans('language.name_ar'),'name'=>'title_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
                    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-plus','label' => trans('language.name_en'),'name'=>'title_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
                    <div class="form-group">
                        <div class="col-3">
                            <label for="record_state">Status:</label>
                            <span class="switch switch-lg switch-icon">
                                     <label>
                                     <input id="record_state" type="checkbox" @if($item->record_state == 1 ) checked
                                            @endif
                                            name="record_state"><span></span>
                                     </label>
                                </span>
                        </div>
                    </div>
                    <div class="form-group">
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
                                               {{ $item->permissions->contains($permission->id) ? 'checked' : ''}}
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

@endsection
@section('submit-button-title' , trans("language.edit"))

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
    </script>
@endsection
