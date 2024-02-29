@extends('admin.layout.table.index')
@section('page-title',trans('language.home-sections'))
@section('root' , "home-sections")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.home-sections')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/home-sections/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.section')}}</th>
        <th>{{trans('language.sort')}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{@$item->section->name}}</td>
            <td>{{$item->sort}}</td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{trans("language.active")}} @else {{trans("language.not_actived")}} @endif</span>
                @if (@$item->section->productCount() <  @$item->design->product_count)
                    <br>
                    <strong style="color: darkred;font-size: 18px"> لن يتم عرض هذا القسم في الصفحه الرئيسيه لعدم وجود
                        منتجات بداخله تناسب التصميم المحدد
                        <br>
                        , يرجي تغير طريقه العرض لتناسب التصميم لكي يتم عرضه في الصفحه الرئيسيه . </strong>
                @endif

            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "home-sections/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/home-sections/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/home-sections/")}}">

        <div style="display: flex">
            {{--            <div class="col-md-3">--}}
            {{--                <input type="text" class="form-control name_input " name="name" value="{{request()->name}}"--}}
            {{--                       placeholder="{{trans('language.name')}}">--}}
            {{--            </div>--}}

            <div class="col-md-3 ">
                <select name="design_id" class="form-control">
                    @foreach($designs as $design)
                        <option @if(request()->design_id == $design->id) selected
                                @endif  value="{{$design->id}}">{{$design->name}}</option>
                    @endforeach
                </select>
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


