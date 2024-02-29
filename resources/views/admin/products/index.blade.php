@extends('admin.layout.table.index')
@section('page-title',trans('language.products'))
@section('root' , "products")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.products')}}</li>
    </ol>
@endsection
@section("buttons")
        <a class="btn btn-success col-md-1 " href="{{url("/admin/products/create")}}">
            {{trans("language.add")}}
        </a>
@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th>{{trans('language.image')}}</th>
        <th>{{trans('language.name_ar')}}</th>
        <th>{{trans('language.name_en')}}</th>
        <th>{{trans('language.model_number')}}</th>
        <th>{{trans('language.price')}}</th>
        <th>{{trans('language.price_sale')}}</th>
        <th>{{trans('language.delivery_time')}}</th>
        <th>{{trans('language.stock_quantity')}}</th>
        <th>{{trans('language.warranty_years')}}</th>
        <th>{{trans('language.is_hot_product')}}</th>
        <th>{{trans('language.is_deal_product')}}</th>
        <th>{{trans('language.images')}}</th>
        <th>{{trans('language.views')}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->image])</td>
            <td>{{$item->name_ar}}</td>
            <td>{{$item->name_en}}</td>
            <td>{{$item->model_number}}</td>
            <td>{{$item->cost}}</td>
            <td>{{$item->sale_cost}}</td>
            <td>{{$item->delivery_time}}</td>
            <td>{{$item->stock_quantity}}</td>
            <td>{{$item->warranty_years}}</td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->is_hot_product == 1) {{trans("language.hot_product")}} @else {{trans("language.not_hot_product")}} @endif</span>
            </td>
            <td>
                <span
                        class="label label-lg label-light-primary label-inline">@if($item->is_deal_product == 1) {{trans("language.deal_product")}} @else {{trans("language.not_deal_product")}} @endif</span>
            </td>

            <td><a class="btn btn-success"
                   href="{{url("/admin/products/$item->id/images")}}"> <i
                            class="fa fa-images"></i> {{trans("language.images")}}</a></td>
            <td>
                <a class="btn btn-primary"
                   href="{{url("/admin/products/$item->id/views")}}"> <i
                            class="fa fa-eye"></i> {{trans("language.views")}}</a>
            </td>
            <td>
                <span class="label label-lg label-light-primary label-inline">@if($item->record_state == 1) {{trans("language.active")}} @else {{trans("language.not_actived")}} @endif</span>
            </td>
            <td>
                    @includeIf("admin.components.buttons.edit" , ["href" => "products/$item->id/edit"])
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/products/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/products/")}}">

        <div style="display: flex">
            <div class="col-md-3">
                <input type="text" class="form-control name_input " name="name" value="{{request()->name}}"
                       placeholder="{{trans('language.name')}}">
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-control">
                    <option @if(request()->category_id == 0 ) selected @endif value="0">جميع الاقسام</option>
                    @foreach($categories as $category)
                        <option @if(request()->category_id == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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


