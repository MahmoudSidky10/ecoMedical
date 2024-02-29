@extends('admin.layout.forms.edit.index')
@section('action' , "permission-categories/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/permission-categories")}}">  {{trans('language.permission-categories')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "clients")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')

    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])

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


@endsection
@section('submit-button-title' , trans("language.edit"))
