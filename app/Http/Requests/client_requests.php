<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class client_requests extends FormRequest
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
            "lname" =>"required | alpha",
              "fname" =>"required | alpha",
              'tel' => 'required | numeric',
              "email" =>"required | email",
              "address" =>"required",
        ];
    }

    public function messages()
    {
        return [
            "lname.required" =>"Nom est obligatoire ",
            "lname.alpha" =>"nom ne devrait contenir que alphabétique ",
            "fname.required" =>"Prénom est obligatoire",
            "fname.alpha" =>"Prénom ne devrait contenir que alphabétique ",
            'tel.required' => 'Téléphone est obligatoire ',
            'tel.numeric' => 'Téléphone devrait être que des nombres ',
            "email.required" =>"Email est obligatoire",
            "email.email" =>"email doit être un email valide",
            "address.required" =>"Adresse est obligatoire",
        ];
    }
}
