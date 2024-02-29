<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionCategoryRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('permission_categories_edit');
    }

    public function rules()
    {
        return [
            'name_ar' => 'string|required',
            'name_en' => 'string|required',
            'record_state' => 'nullable',
        ];
    }
}
