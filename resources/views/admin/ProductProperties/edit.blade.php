@extends('admin.layout.forms.edit.index')
@section('action' , "ProductProperties/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/ProductProperties")}}">  {{trans('language.ProductProperties')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "ProductProperties")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')
     @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])


    <div class="form-group">
        <label>{{trans("language.status")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="record_state">
                <option @if($item->record_state == 1 ) selected @endif value="1"> {{trans('language.active')}}</option>
                <option @if($item->record_state == 0 ) selected
                        @endif value="0"> {{trans('language.not_actived')}}</option>
            </select>
        </div>
    </div>


@endsection
@section('submit-button-title' , trans("language.edit"))
