<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateBookRequest extends FormRequest
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
        $bookId = $this->route('book')->id;
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'stock'       => ['required', 'integer', 'min:0'],
            
            // Regla especial: Único, pero ignora el registro con este ID
            'isbn' => [
                'required', 
                'string', 
                Rule::unique('books')->ignore($bookId)
            ],
        ];
    }
}
