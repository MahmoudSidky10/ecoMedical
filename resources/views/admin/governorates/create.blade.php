@extends('admin.layout.forms.add.index')
@section('action' , "governorates")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/governorates")}}">  {{trans('language.governorates')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.governorates')}}</li>
    </ol>
@endsection
@section('root' , "countries")
@section('page-title',trans('language.countries'))
@section('form-groups')
    @includeIf('admin.components.form.add.select', ['label' => trans("language.countries"),'name'=>'country_id', 'items'=> $countries , 'icon' => 'fa fa-list',])
    @includeIf('admin.components.form.add.text', ['required' => 'required','icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['required' => 'required','icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['required' => 'required','icon' => 'fa fa-user','label' => trans('language.delivery_cost'),'name'=>'delivery_cost', 'placeholder'=>trans('language.delivery_cost' ),'valid'=>trans('language.vaildation')])
@endsection
@section('submit-button-title' , trans('language.add'))
