@extends('admin.layout.forms.add.index')
@section('action' , "ProductProperties")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/ProductProperties")}}">  {{trans('language.ProductProperties')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "ProductProperties")
@section('page-title',trans('language.ProductProperties'))
@section('form-groups')

     @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])

@endsection
@section('submit-button-title' , trans('language.add'))
