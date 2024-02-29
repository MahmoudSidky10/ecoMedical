@extends('admin.layout.table.index')
@section('page-title',trans('language.products'))
@section('root' , "products")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item "><a href="{{url("admin/products")}}"> {{trans('language.products')}} </a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.views')}}</li>
    </ol>
@endsection

@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.name')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->user->name}}</td>
            <td>
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/products/$product->id/views/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


