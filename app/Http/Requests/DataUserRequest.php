<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataUserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required',
            'current_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Kolom nama harus di isi.',
            'username.required' => 'Kolom username harus di isi.',
            'current_password.required' => 'Kolom password harus di isi.',
        ];
    }
}
