<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>'required|min:3|max:25',
            'email' =>'required|min:5|max:25',
            'password' =>'required|min:8|max:120'

        ];
    }
    public  function messages(){
        return [
            'name.required' =>'Поле имя является обязательным',
            'name.min' =>'Поле имя должно состоять больше 5 символов',
            'email.required' =>'Поле Email является обязательным',
            'password.required' =>'Поле пароль является обязательным',
            'password.min' =>'Поле пароль должно состоять не меньше 8 символов'
        ];
    }
}



