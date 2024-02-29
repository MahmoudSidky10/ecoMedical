@extends('admin.layout.forms.edit.index')
@section('action' , "clients/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/clients")}}">  {{trans('language.clients')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "clients")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')

    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name'),'name'=>'name', 'placeholder'=>trans('language.name' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.email'),'name'=>'email', 'placeholder'=>trans('language.email' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.mobile'),'name'=>'mobile', 'placeholder'=>trans('language.mobile' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.password', ['icon' => 'fa fa-user','label' => trans('language.password'),'name'=>'password', 'placeholder'=>trans('language.password' ),'valid'=>trans('language.vaildation')])


    <div class="form-group">
        <label>{{trans("language.status")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="record_state">
                <option @if($item->record_state == 1 ) selected @endif value="1"> {{trans('language.active')}}</option>
                <option @if($item->record_state == 0 ) selected @endif value="0"> {{trans('language.not_actived')}}</option>
            </select>
        </div>
    </div>


@endsection
@section('submit-button-title' , trans("language.edit"))
