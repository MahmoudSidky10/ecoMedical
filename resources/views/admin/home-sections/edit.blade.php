@extends('admin.layout.forms.edit.index')
@section('action' , "home-sections/$item->id")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/home-sections")}}">  {{trans('language.home-sections')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.edit')}}</li>
    </ol>
@endsection
@section('root' , "clients")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')


    <div class="form-group">
        <label>{{trans("language.categories")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control main_category_id_list main_category_id" id="main_category_id"
                    name="category_id">
                <option value="0">اختر القسم</option>
                @foreach($sections as $category)
                    <option @if($category->id == $item->category_id) selected @endif name="main_category_id"
                            value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>



    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.sort'),'name'=>'sort', 'placeholder'=>trans('language.sort' ),'valid'=>trans('language.vaildation')])


    <div class="form-group">
        <label>{{trans("language.status")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="record_state">
                <option @if($item->record_state == 1 ) selected @endif value="1"> {{trans('language.active')}}</option>
                <option @if($item->record_state == 0 ) selected
                        @endif value="0"> {{trans('language.not_actived')}}</option>
            </select>
        </div>
    </div>


@endsection
@section('submit-button-title' , trans("language.edit"))
@section('js')
    <script>

        $('.main_category_id').on('change', function () {
            var category_id = $('.main_category_id').val();
            $.post("{{url("/admin/getDesigns")}}",
                {
                    category_id: category_id,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {

                    if (data.status == true) {
                        $('.design_id_list').html('');
                        if (data.status == true) {
                            $(".design_id_list").prepend('' +
                                '<option value="">اختر التصميم</option>');
                        }
                        $.each(data, function () {
                            $.each(this, function (index, item) {
                                console.log(item);
                                $(".design_id_list").prepend('' +
                                    '<option  value="' + item.id + '">' + item.name + '</option>');
                            });
                        });
                    } else {
                        $('.design_id_list').html('');
                        $(".design_id_list").prepend('' +
                            '<option value="" >لا توجد تصاميم </option>');
                    }
                });
        });

    </script>
@endsection