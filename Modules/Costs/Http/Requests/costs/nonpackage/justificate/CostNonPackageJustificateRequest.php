<?php

namespace Modules\Costs\Http\Requests\Costs\nonpackage\justificate;

use Illuminate\Foundation\Http\FormRequest;

class CostNonPackageJustificateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'justificate' => 'required|mimes:jpeg, pdf, png',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
