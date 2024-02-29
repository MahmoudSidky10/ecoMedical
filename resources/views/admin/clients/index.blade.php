@extends('admin.layout.table.index')
@section('page-title',__('language.clients'))
@section('root' , "clients")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{__('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('language.clients')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/clients/create")}}">
            {{__("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{__('language.name')}}</th>
        <th>{{__('language.email')}}</th>
        <th>{{__('language.mobile')}}</th>
        <th>{{__('language.address')}}</th>
        <th>{{__('language.status')}}</th>
        <th>{{__('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->mobile}}</td>
            <td>
                <a class="btn btn-primary"
                   href="{{url("/admin/clients/$item->id/address")}}"> <i
                            class="fa fa-address-card"></i> {{trans("language.address")}}</a></td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{__("language.active")}} @else {{__("language.not_actived")}} @endif</span>
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "clients/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/clients/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/clients/")}}">

        <div style="display: flex">
            <div class="col-md-3">
                <input type="text" class="form-control name_input " name="name" value="{{request()->name}}"
                       placeholder="{{__('language.name')}}">
            </div>
            <div class="col-md-3">
                <input style="width: 45%" type="submit" class="btn btn-success " value="{{__('language.filter')}}">
                <button style="width: 45%" type="button"
                        class="btn btn-info  reset_inputs ">{{__('language.reset')}}</button>
            </div>
        </div>
    </form>
@stop

@section("js")

    <script>
        $('.reset_inputs').click(function () {
            $('.name_input').val('');
        });
    </script>

@endsection


