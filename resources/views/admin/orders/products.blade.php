@extends('admin.layout.table.index')
@section('page-title',trans('language.products'))
@section('root' , "products")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/orders")}}">  {{trans('language.orders')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.products')}}</li>
    </ol>
@endsection
 
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.count')}}</th>
        <th>{{trans('language.price')}}</th>
        <th>{{trans('language.name_ar')}}</th>
        <th>{{trans('language.name_en')}}</th>
        <th>{{trans('language.model_number')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->count}}</td>
            <td>{{ $item->price }} {{$setting->app_currency}} </td>
            <td>{{@$item->product->name_ar}}</td>
            <td>{{@$item->product->name_en}}</td>
            <td>{{@$item->product->model_number}}</td>
        </tr>
    @endforeach
@endsection


