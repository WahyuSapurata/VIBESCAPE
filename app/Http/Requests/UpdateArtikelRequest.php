<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtikelRequest extends FormRequest
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
            'kategori' => 'required',
            'judul_artikel' => 'required',
            'konten' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori.required' => 'Kolom nama kategori harus di isi.',
            'judul_artikel.required' => 'Kolom judul artikel harus di isi.',
            'konten.required' => 'Kolom konten harus di isi.',
        ];
    }
}
