@extends('admin.layout.forms.add.index')
@section('action' , "coupons")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/coupons")}}">  {{trans('language.coupons')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "coupons")
@section('page-title',trans('language.coupons'))
@section('form-groups')

    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.code'),'name'=>'code', 'placeholder'=>trans('language.code' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.discount'),'name'=>'discount', 'placeholder'=>trans('language.discount' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.max_using'),'name'=>'max_using', 'placeholder'=>trans('language.max_using' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.user_max_using'),'name'=>'user_max_using', 'placeholder'=>trans('language.user_max_using' ),'valid'=>trans('language.vaildation')])

    @includeIf('admin.components.form.add.date', ['icon' => 'fa fa-user','label' => trans('language.start_date'),'name'=>'starts_at', 'placeholder'=>trans('language.start_date')])
    @includeIf('admin.components.form.add.date', ['icon' => 'fa fa-user','label' => trans('language.expired_date'),'name'=>'expires_at', 'placeholder'=>trans('language.expired_date')])



@endsection
@section('submit-button-title' , trans('language.add'))
