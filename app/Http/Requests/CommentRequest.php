<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title'       => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:1500']
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Поле Название должно быть заполнено!',
            'title.min'             => 'Поле должно содержать не менее 3 символов!',
            'title.max'             => 'Поле должно содержать не более 255 символов!',
            'description.required'  => 'Поле должно быть заполнено!',
            'description.min'       => 'Поле должно содержать не менее 5 символов!',
            'description.max'       => 'Поле Коментарий должно содержать не более 1500 символов!'
        ];
    }
}
