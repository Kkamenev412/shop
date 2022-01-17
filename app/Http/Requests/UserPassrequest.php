<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPassrequest extends FormRequest
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
            'password' =>'required|min:8|max:120'

        ];
    }
    public  function messages(){
        return [
            'password.required' =>'Поле пароль является обязательным',
            'password.min' =>'Поле пароль должно состоять не меньше 8 символов'
        ];
    }
}
