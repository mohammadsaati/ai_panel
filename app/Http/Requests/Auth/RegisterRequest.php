<?php

namespace App\Http\Requests\Auth;

use App\Enums\Admin\Gender;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          =>  'required|min:3' ,
            'last_name'     =>  'required|min:3' ,
            'birth_day'     =>  'required' ,
            'phone_number'  =>  'required|min:11|max:11' ,
            'email'         =>  'required|unique:admins,email' ,
            'gender'        =>  'required|in:'.Gender::FEMALE->value.','.Gender::MALE->value,
            'password'      =>  'required|min:6' ,
            'description'   =>  'nullable|max:300'

        ];
    }
}
