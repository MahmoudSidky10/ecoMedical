@extends('admin.layout.table.index')
@section('page-title',trans('language.permission-categories'))
@section('root' , "permission-categories")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.permission-categories')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1" href="{{url("/admin/permission-categories/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <th>#</th>
    <th>{{trans('language.name_ar')}}</th>
    <th>{{trans('language.name_en')}}</th>
    <th>{{trans('language.status')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->name_ar}}</td>
            <td>{{$item->name_en}}</td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{trans("language.actived")}} @else {{trans("language.not_actived")}} @endif</span>
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "permission-categories/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => " " ,  "action" => url("admin/permission-categories/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/permission-categories/")}}">

        <div style="display: flex">
            <div class="col-md-3">
                <input type="text" class="form-control name_input " name="name" value="{{request()->name}}"
                       placeholder="{{trans('language.name')}}">
            </div>
            <div class="col-md-3">
                <input style="width: 45%" type="submit" class="btn btn-success " value="{{trans('language.filter')}}">
                <button style="width: 45%" type="button"
                        class="btn btn-info  reset_inputs ">{{trans('language.reset')}}</button>
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


