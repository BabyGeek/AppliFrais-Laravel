<?php

namespace Modules\Costs\Http\Requests\Costs\package;

use Illuminate\Foundation\Http\FormRequest;

class CostPackageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cost_id' => 'required|numeric',
            'value' => 'required|numeric',
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
                laraflash()->message()
                            ->content("Il y a une erreur avec votre formulaire, veuillez saisir correctement les champs indiqués")
                            ->title('Erreur de validation du formulaire')
                            ->danger();
            }
        });
    }
}
