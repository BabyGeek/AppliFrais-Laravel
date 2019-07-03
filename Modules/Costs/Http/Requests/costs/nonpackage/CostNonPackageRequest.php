<?php

namespace Modules\Costs\Http\Requests\Costs\nonpackage;

use Illuminate\Foundation\Http\FormRequest;
use LaraFlash;

class CostNonPackageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'label' => 'required|string|max:30',
            'date' => 'required|date',
            'value' => 'required|numeric',
            'justificate' => 'mimes:jpeg,pdf,png',
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
                LaraFlash::warning("Il y a une erreur avec votre formulaire, veuillez saisir correctement les champs indiqués");
            }
        });
    }
}
