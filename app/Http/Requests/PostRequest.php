<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "required|min:5|unique:posts",
            "description" => "required|min:10"
        ];
    }

    public function messages()
    {
        return [
            ["title.required" => "No empty titles"],
            ["title.unique" => "Unique titles are only allowed"],
            ["title.min" => "Title should be at least 3 char"],
            ["description" => "no empty inputs"],
            ["description.min" => "descrption at least 10 char"]
        ];
    }
}
