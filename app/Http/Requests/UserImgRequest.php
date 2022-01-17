<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserImgRequest extends FormRequest
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
            'image' =>'required|image|nullable|max:1999'

        ];
    }
    public  function messages(){
        return [
            'image.required' =>'Поле фото профеля является обязательным',
            'image.max' =>'Фото профеля не должно привышать 2 Мб'
        ];
    }
}
