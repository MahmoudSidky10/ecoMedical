@extends('admin.layout.forms.edit.index')
@section('action' , "updateSettings")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/settings")}}">  {{trans('language.settings')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "clients")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')


    @includeIf('admin.components.form.edit.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'app_logo', 'max'=>'2'])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name'),'name'=>'app_name', 'placeholder'=>trans('language.name' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.app_currency'),'name'=>'app_currency', 'placeholder'=>trans('language.app_currency' ),'valid'=>trans('language.vaildation')])
    <div class="form-group">
        <label for="exampleColorInput" class="form-label">Color picker</label>
        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="app_color"
               value="{{$item->app_color}}"
               title="Choose your color">
    </div>
    @includeIf('admin.components.form.edit.textarea', ['icon' => '','label' => trans('language.description'),'name'=>'app_description', 'placeholder'=>trans('language.description' ),'valid'=>trans('language.vaildation')])


    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('السعر الادني لتطبيق مبلغ التوصيل'),'name'=>'delivery_min_price', 'placeholder'=>trans('السعر الادني لتطبيق مبلغ التوصيل' ),'valid'=>trans('language.vaildation')])



@endsection
@section('submit-button-title' , trans("language.edit"))
