<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        if (request()->ajax())
        {
          return [
              "status"      =>  "required|in:1,0"
          ];
        }
        return [
            "title"             =>  "required|min:3|max:100" ,
            "status"            =>  "required|in:1,0" ,
            "category_id"       =>  "required|exists:categories,id" ,
            "content_type_id"   =>  "required|exists:content_types,id" ,
            "image"             =>  "sometimes|file|mimes:jpg,jpeg,png" ,
            "description"       =>  "required"
        ];
    }
}
