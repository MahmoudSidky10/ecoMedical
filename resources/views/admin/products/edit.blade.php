@extends('admin.layout.forms.edit.index')
@section('action' , "products/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/products")}}">  {{trans('language.products')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "products")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')


    <div class="form-group">
        <label>{{trans("language.category")}}  </label>
        <strong style="font-size: 14px;float: left"> ( {{@$item->category_name}} ) </strong>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select class="form-control " name="category_id">
                @foreach($categories as $category)
                    <option @if($category->id == $item->category_id) selected
                            @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        <label>{{trans("language.brands")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select class="form-control " name="brand_id">
                <option>اختر الماركة</option>
                @foreach($brands as $brand)
                    <option @if($brand->id == $item->brand_id) selected
                            @endif value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.price'),'name'=>'price', 'placeholder'=>trans('language.price' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.price_sale'),'name'=>'price_sale', 'placeholder'=>trans('language.price_sale' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.model_number'),'name'=>'model_number', 'placeholder'=>trans('language.model_number' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.delivery_time'),'name'=>'delivery_time', 'placeholder'=>trans('language.delivery_time' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.number', ['icon' => 'fa fa-user','label' => trans('language.stock_quantity'),'name'=>'stock_quantity', 'placeholder'=>trans('language.stock_quantity' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.warranty_years'),'name'=>'warranty_years', 'placeholder'=>trans('language.warranty_years' ),'valid'=>trans('language.vaildation')])

    <div class="form-group">
        <label>{{trans("language.is_hot_product")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="is_hot_product">
                <option @if($item->is_hot_product == 1 ) selected
                        @endif value="1"> {{trans('language.hot_product')}}</option>
                <option @if($item->is_hot_product == 0 ) selected
                        @endif value="0"> {{trans('language.not_hot_product')}}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label>{{trans("language.is_deal_product")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="is_deal_product">
                <option @if($item->is_deal_product == 1 ) selected
                        @endif value="1"> {{trans('language.deal_product')}}</option>
                <option @if($item->is_deal_product == 0 ) selected
                        @endif value="0"> {{trans('language.not_deal_product')}}</option>
            </select>
        </div>
    </div>


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
