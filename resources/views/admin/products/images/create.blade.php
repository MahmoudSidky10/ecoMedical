@extends('admin.layout.forms.add.index')
@section('action' , "products/$product_id/images")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/products")}}">  {{trans('language.products')}}</a></li>
        <li class="breadcrumb-item"><a
                    href="{{url("admin/products/$product_id/images")}}">  {{trans('language.images')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "products")
@section('page-title',trans('language.images'))
@section('form-groups')

    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])

@endsection
@section('submit-button-title' , trans('language.add'))
