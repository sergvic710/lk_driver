<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8'
        ];
        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'name' => 'string',
                        'password' => 'string|min:8'
/*                        'email' => [
                            'required',
                            Rule::unique('users')->ignore($this->email, 'email') //должен быть уникальным, за исключением себя же
                        ]*/
                    ];// + $rules; // и берем все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
//                    'email' => 'required|string|exists:users,email'
                ];
        }
    }
}
