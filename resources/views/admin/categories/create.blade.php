@extends('admin.layout.forms.add.index')
@section('action' , "categories")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/categories")}}">  {{trans('language.categories')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "categories")
@section('page-title',trans('language.categories'))
@section('form-groups')

    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.icon'),'name'=>'icon', 'placeholder'=>trans('language.icon' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])

@endsection
@section('submit-button-title' , trans('language.add'))
