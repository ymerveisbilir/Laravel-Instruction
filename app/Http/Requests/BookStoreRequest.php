<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'name' => 'required|max:20',
            'price' => 'required',
            'categories' => 'required'
        ];
    }

    public function messages(): array
    {
    return [
        'name.required' => 'Kitap adı alanı boş bırakılamaz.',
        'price.required' => 'Fiyat alanı boş bırakılamaz.',
        'name.max' => 'Kitap adı 20 karakterden fazla olmamalıdır.',
        'categories.required' => 'Kategori seçmek zorunludur.'
    ];
    }


}
