<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIklanRequest extends FormRequest
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
            'judul_iklan' => 'required',
            'thumbnail' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'judul_iklan.required' => 'Kolom judul iklan harus di isi.',
            'thumbnail.required' => 'Kolom thumbnail harus di isi.',
            'link.required' => 'Kolom link harus di isi.',
        ];
    }
}
