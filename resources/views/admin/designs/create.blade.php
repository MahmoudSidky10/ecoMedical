@extends('admin.layout.forms.add.index')
@section('action' , "designs")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/designs")}}">  {{trans('language.designs')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "designs")
@section('page-title',trans('language.designs'))
@section('form-groups')

    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name'),'name'=>'name', 'placeholder'=>trans('language.name' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.count'),'name'=>'product_count', 'placeholder'=>trans('language.count' ),'valid'=>trans('language.vaildation')])

    <div class="form-group">
        <label>{{trans("language.design_type")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="type">
                <option   value="1"> {{trans('language.web_app')}}</option>
                <option   value="0"> {{trans('language.mobile_app')}}</option>
            </select>
        </div>
    </div>


@endsection
@section('submit-button-title' , trans('language.add'))
