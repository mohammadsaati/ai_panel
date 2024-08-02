<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title"             =>  "required|min:3|max:100" ,
            "status"            =>  "required|in:1,2" ,
            "category_id"       =>  "required|exists:categories,id" ,
            "content_type_id"   =>  "required|exists:content_types,id" ,
            "image"             =>  "required|file|mimes:jpg,jpeg,png" ,
            "description"       =>  "required"
        ];
    }
}
