@extends('admin.layout.table.index')
@section('page-title',trans('language.categories'))
@section('root' , "categories")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.categories')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/categories/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.image')}}</th>
        <th>{{trans('language.icon')}}</th>
        <th>{{trans('language.name_ar')}}</th>
        <th>{{trans('language.name_en')}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.subCategories')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->image])</td>
            <td><i class="{{$item->icon}}"></i></td>
            <td>{{$item->name_ar}}</td>
            <td>{{$item->name_en}}</td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{trans("language.active")}} @else {{trans("language.not_actived")}} @endif</span>
            </td>
            <td>
                <a class="btn btn-success  " href="{{url("/admin/categories/$item->id/subCategories")}}">
                    {{trans("language.subCategories")}}
                </a>
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "categories/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/categories/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/categories/")}}">

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


