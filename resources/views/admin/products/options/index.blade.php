@extends('admin.layout.table.index')
@section('page-title',trans('language.products'))
@section('root' , "products")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item "><a href="{{url("admin/products")}}"> {{trans('language.products')}} </a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.options')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/products/$product->id/options/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.name_ar')}}</th>
        <th>{{trans('language.name_en')}}</th>
        <th>{{trans('language.price')}}</th>
        <th>{{trans('language.type')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->name_ar}}</td>
            <td>{{$item->name_en}}</td>
            <td>{{$item->price}}</td>
            <td>{{@$item->productProperty->name}}</td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "products/$product->id/options/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/products/$product->id/options/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


