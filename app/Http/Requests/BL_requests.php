<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BL_requests extends FormRequest
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
            "datebl" =>"required | date",
            "ref" =>"required",
            "product_name" => "required ",
            "quantity" =>"required | numeric",
            "budget" =>"required| numeric",
            "tva" =>"required| numeric",
        ];
    }

    public function messages()
    {
        return [
            "datebl.required" =>"date Bon Livration est obligatoire ",
            "datebl.date" =>"date Bon Livration ne devrait contenir que date ",
            "ref.required" =>"Référence est obligatoire",
            'product_name.required' => 'nom produit est obligatoire | ',
            "quantity.required" =>"quantité est obligatoire",
            "quantity.numeric" =>"quantité ne devrait contenir que des chiffres",
            "budget.required" =>"prix est obligatoire",
            "budget.numeric" =>"prix ne devrait contenir que des chiffres",
            "tva.required" =>"TVA est obligatoire",
            "tva.numeric" =>"TVA ne devrait contenir que des chiffres",

        ];
    }
}
