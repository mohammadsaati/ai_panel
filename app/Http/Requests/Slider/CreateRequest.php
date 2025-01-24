<?php

namespace App\Http\Requests\Slider;

use App\Enums\SliderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'image' => 'required|file:jpg,png,jpeg',
            'type' => ['required', Rule::in(SliderEnum::allType())],
            'product_id' => [Rule::requiredIf(fn() =>  $this->input('type') == SliderEnum::PRODUCT->value)],
            'category_id' => [Rule::requiredIf(fn() =>  $this->input('type') == SliderEnum::CATEGORY->value)],
            'priority' => 'required|integer',
        ];
    }
}
