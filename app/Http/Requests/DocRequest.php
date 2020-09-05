<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocRequest extends FormRequest
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
            'user' => 'required|integer',
            'mime' => 'required|string',
            'title' => 'required|string',
            'file' => 'required|file',
        ];
        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'DELETE':
                return [
//                    'email' => 'required|string|exists:users,email'
                ];
        }
    }
}
