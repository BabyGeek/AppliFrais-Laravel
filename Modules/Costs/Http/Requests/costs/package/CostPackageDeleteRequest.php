<?php

namespace Modules\Costs\Http\Requests\Costs\package;

use Illuminate\Foundation\Http\FormRequest;
use \Laraflash\Facades\Laraflash;

class CostPackageDeleteRequest extends FormRequest
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
                //laraflash()->message()->content("Problème avec votre validation de suppression")->title('Formulaire non valide')->type('warning');
            }
        });
    }
}
