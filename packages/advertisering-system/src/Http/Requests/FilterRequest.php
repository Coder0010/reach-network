<?php

namespace MostafaKamel\AdvertiseringSystem\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use MostafaKamel\AdvertiseringSystem\Models\Filter;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => [
                'required',
                'string',
                    Rule::unique('filters')->where(function($query) {
                        $query->whereType(request('type'));
                    })
                ],
            'type' => [
                'required',
                'string',
                'in:'.Filter::CATEGORY_TYPE.','.Filter::TAG_TYPE
            ],
        ];
    }
}
