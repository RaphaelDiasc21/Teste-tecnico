<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'nome'=>'required',
            'email'=>'required|unique:clients',
            'telefone'=>'required',
            'estado' => 'required',
            'cidade' => 'required',
            'data_de_nascimento' => 'required',
            'plan_id' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nome.required'=>'O nome do cliente deve ser obrigatório',
            'email.required'=> 'Email do cliente é obrigatório',
            'email.unique' => 'Email digitado já se encontra em uso',
            'telefone.required' => 'Telefone do cliente deve ser obrigatório',
            'estado.required' => 'O estado onde mora o cliente deve ser obrigatório',
            'cidade.required' => 'A cidade onde mora o cliente deve ser obrigatória',
            'data_de_nascimento.required' => 'Data de nascimento do cliente é obrigatória',
            'plan_id.required' => 'O cliente deve ter ao menos um plano de assinatura !'
        ];
    }
}
