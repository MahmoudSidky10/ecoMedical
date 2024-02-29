@extends('admin.layout.forms.add.index')
@section('action' , "products/$product_id/options")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/products")}}">  {{trans('language.products')}}</a></li>
        <li class="breadcrumb-item"><a
                    href="{{url("admin/products/$product_id/options")}}">  {{trans('language.options')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "products")
@section('page-title',trans('language.options'))
@section('form-groups')

    @includeIf('admin.components.form.add.select', ['label' => trans("language.ProductProperties"),'name'=>'product_property_id', 'items'=> $items , 'icon' => 'fa fa-list',])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.price'),'name'=>'price', 'placeholder'=>trans('language.price' ),'valid'=>trans('language.vaildation')])

@endsection
@section('submit-button-title' , trans('language.add'))
