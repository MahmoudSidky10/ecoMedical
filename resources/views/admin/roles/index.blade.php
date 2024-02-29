@extends('admin.layout.table.index')
@section('page-title',trans('language.roles'))
@section('root' , "roles")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.roles')}}</li>
    </ol>
@endsection
@section("buttons")
{{--        <a class="btn btn-success col-md-1" href="{{url("/admin/roles/create")}}">--}}
{{--            {{trans("language.add")}}--}}
{{--        </a>--}}
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.name_ar')}}</th>
        <th>{{trans('language.name_en')}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.permissions')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->title_ar}}</td>
            <td>{{$item->title_en}}</td>
            <td>{{$item->record_state_name}}</td>
            <td>
                @foreach($item->permissions as $permission)
                    <span class="badge badge-primary mt-2"> {{$permission->name ?$permission->name : $permission->title }}</span>
                @endforeach
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "roles/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/roles/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection



