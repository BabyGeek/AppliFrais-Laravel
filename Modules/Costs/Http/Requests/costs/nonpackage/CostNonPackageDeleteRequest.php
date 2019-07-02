<?php

namespace Modules\Costs\Http\Requests\Costs\nonpackage;

use Illuminate\Foundation\Http\FormRequest;

class CostNonPackageDeleteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accepted' => 'accepted',
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

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator
    * @return void
    */
    public function withValidator($validator)
    {
        $validator->after(function ($validator)
        {
            if ($validator->errors()->count() > 0)
            {
                LaraFlash::add("Problème avec votre validation de suppression", array('type' => 'warning'));

            }
        });
    }
}
