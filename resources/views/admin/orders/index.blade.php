@extends('admin.layout.table.index')
@section('page-title',trans('language.orders'))
@section('root' , "orders")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.orders')}}</li>
    </ol>
@endsection
@section("buttons")

@endsection
@section('thead')
    <tr class="text-center">
        <th>#</th>
        <th class="order-user">{{__("language.client_name")}}</th>
        <th class="order-date">{{__("language.date")}}</th>
        <th class="order-status">{{__("language.sub_total")}}</th>
        <th class="order-delivery-cost">{{__("language.delivery_cost")}}</th>
        <th class="order-total">{{__("language.total_price")}}</th>
        <th class="order-products">{{__("language.products")}}</th>
        <th>{{trans('language.status')}}</th>
        <th>{{trans('language.settings')}}</th>
    </tr>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr class="text-center">
            <td> {{ $item->id }}</td>
            <td>{{$item->user->name}}</td>
            <td>{{$item->created_at->format("d/m/Y")}}</td>
            <td>{{$item->subtotal}} {{$setting->app_currency}} </td>
            <td> {{$item->delivery_cost}}  {{$setting->app_currency}} </td>
            <td> {{$item->total}}  {{$setting->app_currency}} </td>
            <td>
                <a class="btn btn-success  " href="{{url("/admin/orders/$item->id/products")}}">
                    {{trans("language.products")}}
                </a>
            </td>
            <td>
                <span class="badge badge-primary mt-2">  {{$item->productStatus()}} </span></td>

            <td>
                    @includeIf("admin.components.buttons.delete",["message" => "($item->name)" ,  "action" => url("admin/orders/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection

@section("filters")
    <form method="get" action="{{url("/admin/orders/")}}">

        <div style="display: flex">

            <div class="col-md-3 p-6">
                <select name="status" class="form-control">
                    <option @if(request()->status == 0 ) selected @endif value="0">قيد المراجعه والتنفيذ</option>
                    <option @if(request()->status == 1 ) selected @endif value="1">تم الموافقه علي الطلب</option>
                    <option @if(request()->status == 2 ) selected @endif value="2">جاري توصيل الطلب اليك</option>
                    <option @if(request()->status == 3 ) selected @endif value="3">تم رفض الطلب من النظام</option>
                    <option @if(request()->status == 4 ) selected @endif value="4">تم الانتهاء من الطلب</option>
                    <option @if(request()->status == 5 ) selected @endif value="5">حدثت مشكله اثناء التوصيل</option>
                </select>
            </div>

            <div class="col-md-2">
                <label style="margin-bottom: 0px">{{trans('من وقت')}}</label>
                <input style="margin-top: 0px!important;" type="date" class="form-control start_at" name="start_at"
                       value="{{request()->start_at}}"
                       placeholder="{{trans('language.start_at')}}">
            </div>

            <div class="col-md-2">
                <label style="margin-bottom: 0px">{{trans('الي وقت')}}</label>
                <input style="margin-top: 0px!important;" type="date" class="form-control end_at " name="end_at"
                       value="{{request()->end_at}}"
                       placeholder="{{trans('language.end_at')}}">
            </div>


            <div class="col-md-3 p-6">
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
            $('.start_at').val('');
            $('.end_at').val('');
        });
    </script>

@endsection


