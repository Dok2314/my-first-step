<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $this->post = Post::findOrFail($this->route('post'));

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
            'title'       => ['required', 'min:3', 'max:150'],
            'slug'        => [
                tap(Rule::unique(Post::class), function(Unique $rule) {
                    if ($this->isMethod('PATCH')) {
                        $rule->ignore($this->route('post')->getKey());
                    }
                })
            ],
            'description' => ['required', 'min:5', 'max:1500']
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'Пост должен содержать название!',
            'title.min'            => 'Название должно быть не менее 3 символов!',
            'title.max'            => 'Название должно быть не более 150 символов!',
            'slug.unique'          => 'Данный пост уже существует!',
            'description.required' => 'Поле пост должно быть заполнено!',
            'description.min'      => 'Пост должен содержать не менее 5 символов!',
            'description.max'      => 'Пост должен быть не более 1500 символов!'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
