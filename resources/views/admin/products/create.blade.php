@extends('admin.layout.forms.add.index')
@section('action' , "products")
@section('nav')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">  {{trans('language.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/products")}}">  {{trans('language.products')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('language.add')}}</li>
    </ol>
@endsection
@section('root' , "products")
@section('page-title',trans('language.products'))
@section('form-groups')


    <div class="col-md-12">
        <div class="row">
            @includeIf('admin.components.form.add.file', ['class' => 'col-md-2', 'icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'images[]', 'max'=>'2'])
            @includeIf('admin.components.form.add.file', ['class' => 'col-md-2', 'icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'images[]', 'max'=>'2'])
            @includeIf('admin.components.form.add.file', ['class' => 'col-md-4', 'icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'images[]', 'max'=>'2'])
            @includeIf('admin.components.form.add.file', ['class' => 'col-md-2', 'icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'images[]', 'max'=>'2'])
            @includeIf('admin.components.form.add.file', ['class' => 'col-md-2', 'icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'images[]', 'max'=>'2'])

        </div>
    </div>

    <div class="form-group">
        <label>{{trans("language.category")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control main_category_id_list main_category_id" id="main_category_id"
                    name="main_category_id">
                <option value="0">اختر القسم</option>
                @foreach(\App\Models\Category::where("parent_id",null)->get() as $category)
                    <option name="main_category_id" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group  category_List">
        <label>{{trans("language.category")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select id="category_id" name="category_id"
                    class=" form-control category_id_list category_id">
                <option name="sub_category_id" class="basicOption" value="0">اختر القسم</option>
            </select>

        </div>
    </div>


    <br>



    <div class="form-group">
        <label>{{trans("language.brands")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select class="form-control " name="brand_id">
                <option>اختر الماركة</option>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
    </div>



    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.price'),'name'=>'price', 'placeholder'=>trans('language.price' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.price_sale'),'name'=>'price_sale', 'placeholder'=>trans('language.price_sale' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.model_number'),'name'=>'model_number', 'placeholder'=>trans('language.model_number' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.delivery_time'),'name'=>'delivery_time', 'placeholder'=>trans('language.delivery_time' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.number', ['icon' => 'fa fa-user','label' => trans('language.stock_quantity'),'name'=>'stock_quantity', 'placeholder'=>trans('language.stock_quantity' ),'valid'=>trans('language.vaildation')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.warranty_years'),'name'=>'warranty_years', 'placeholder'=>trans('language.warranty_years' ),'valid'=>trans('language.vaildation')])

    <div class="form-group">
        <label>{{trans("language.is_hot_product")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="is_hot_product">
                <option value="1"> {{trans('language.hot_product')}}</option>
                <option value="0"> {{trans('language.not_hot_product')}}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label>{{trans("language.is_deal_product")}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fa fa-list'></i></span>
            </div>
            <select required class="form-control " id="" name="is_deal_product">
                <option value="1"> {{trans('language.deal_product')}}</option>
                <option value="0"> {{trans('language.not_deal_product')}}</option>
            </select>
        </div>
    </div>

@endsection
@section('submit-button-title' , trans('language.add'))
@section('js')
    <script>

        $('.main_category_id').on('change', function () {
            var main_category_id = $('.main_category_id').val();
            $.post("{{url("/admin/getCategories")}}",
                {
                    category_id: main_category_id,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {

                    if (data.status == true) {
                        $('.category_id_list').html('');
                        if (data.status == true) {
                            $(".category_id_list").prepend('' +
                                '<option  value="0"> اختر قسم فرعي</option>');
                        }
                        $.each(data, function () {
                            $.each(this, function (index, item) {
                                console.log(item);
                                $(".category_id_list").prepend('' +
                                    '<option name="sub_category_id"  value="' + item.id + '">' + item.name_ar + '</option>');
                            });
                        });
                    } else {
                        $('.category_id_list').html('');
                        $(".category_id_list").prepend('' +
                            '<option name="sub_category_id"  value="0">لا توجد اقسام فرعيه </option>');
                    }
                });
        });
        $('.category_id').on('change', function () {
            var category_id = $('.category_id').val();
            $.post("{{url("/admin/getCategories")}}",
                {
                    category_id: category_id,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {

                    if (data.status == true) {
                        $('.category_id_list').html('');
                        if (data.status == true) {
                            $(".category_id_list").prepend('' +
                                '<option  value="0"> اختر قسم فرعي</option>');
                        }
                        $.each(data, function () {
                            $.each(this, function (index, item) {
                                console.log(item);
                                $(".category_id_list").prepend('' +
                                    '<option name="sub_category_id"  value="' + item.id + '">' + item.name_ar + '</option>');
                            });
                        });
                    } else {
                        // fire popup to inform user that no categories inside this category ..
                        Swal.fire({
                            icon: 'info',
                            title: 'انتيه رجاء',
                            text: 'لا يوجد اقسام فرعي بداخل هذا القسم',
                            confirmButtonText: 'تأكيد',
                        })
                    }
                });
        });

    </script>

@endsection