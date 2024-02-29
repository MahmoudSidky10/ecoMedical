@extends('admin.layout.forms.add.index')
@section('action' , "sliders")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/sliders")}}">  {{trans('language.sliders')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "sliders")
@section('page-title',trans('language.sliders'))
@section('form-groups')

    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.link'),'name'=>'link', 'placeholder'=>trans('language.link' ),'valid'=>trans('language.vaildation')])

    <div class="form-group">
        <label class="required">{{__("language.places")}}</label>
        <div class="">
            <select required class="form-control" name="page_place">
                <option value="1">{{__("language.top")}}</option>
                <option value="2">{{__("language.mid")}}</option>
                <option value="3">{{__("language.down")}}</option>
            </select>
        </div>
    </div>



@endsection
@section('submit-button-title' , trans('language.add'))
