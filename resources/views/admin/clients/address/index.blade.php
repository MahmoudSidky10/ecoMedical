@extends('admin.layout.table.index')
@section('page-title',trans('language.clients'))
@section('root' , "clients")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item "><a href="{{url("admin/clients")}}"> {{trans('language.clients')}} </a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.address')}}</li>
    </ol>
@endsection

@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.country')}}</th>
        <th>{{trans('language.governorate')}}</th>
        <th>{{trans('language.street')}}</th>
        <th>{{trans('language.building_number')}}</th>
        <th>{{trans('language.postal_code')}}</th>
        <th>{{trans('language.floor')}}</th>
        <th>{{trans('language.room')}}</th>
        <th>{{trans('language.landmark')}}</th>
        <th>{{trans('language.additional_information')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{@$item->country->name}}</td>
            <td>{{@$item->governorate->name}}</td>
            <td>{{$item->street}}</td>
            <td>{{$item->building_number}}</td>
            <td>{{$item->postal_code}}</td>
            <td>{{$item->floor}}</td>
            <td>{{$item->room}}</td>
            <td>{{$item->landmark}}</td>
            <td>{{$item->additional_information}}</td>
            <td>
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/clients/$clientId/address/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


