@extends('admin.layout.table.index')
@section('page-title',trans('language.designs'))
@section('root' , "designs")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.designs')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/designs/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.image')}}</th>
        <th>{{trans('language.name')}}</th>
        <th>{{trans('language.count')}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->image])</td>
            <td>{{$item->name}}</td>
            <td>{{$item->product_count}}</td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{trans("language.active")}} @else {{trans("language.not_actived")}} @endif</span>
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "designs/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/designs/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/designs/")}}">

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


