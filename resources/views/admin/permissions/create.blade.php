@extends('admin.layout.forms.add.index')
@section('action' , "permissions")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/permissions")}}">  {{trans('language.permissions')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "permissions")
@section('page-title',trans('language.permissions'))
@section('form-groups')
    @includeIf('admin.components.form.add.select', ['label' => trans("language.permission-categories"),'name'=>'category_id', 'items'=> $categories , 'icon' => 'fa fa-list',])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.title'),'name'=>'title', 'placeholder'=>trans('language.title' ),'valid'=>trans('language.vaildation')])

    <div class="form-group">
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


@endsection
@section('submit-button-title' , trans('language.add'))
