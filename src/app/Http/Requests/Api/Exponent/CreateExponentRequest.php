<?php

namespace App\Http\Requests\Api\Exponent;

use Illuminate\Foundation\Http\FormRequest;

class CreateExponentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:exponents'],
            'short_desc' => ['required', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'full_desc' => ['required', 'string'],
            'logo' => ['required', 'file', 'image', 'max:2000'],
            'main_img' => ['required', 'file', 'image', 'max:2000'],
            'website_link' => ['required', 'string'],
            'contacts' => ['required', 'array'],
            'contacts.*' => ['required', 'array'],
            'contacts.*.type' => ['required', 'string', 'in:phone,email'],
            'contacts.*.value' => ['required', 'string', 'max:255'],
            'inn' => ['required', 'digits:12', 'unique:exponents'],
            'kpp' => ['nullable', 'digits:9'],
            'ogrn' => ['nullable', 'digits:13'],
            'business_address' => ['nullable', 'string', 'max:255'],
            'production_address' => ['nullable', 'string', 'max:255'],
            'is_import_substitution' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
            'sector_id' => ['required', 'exists:sectors,id'],
            'user_id' => ['required', 'exists:users,id'],
            'verification_status' => ['required', 'int', 'in:0,1,2'],
            'verification_comment' => ['nullable', 'string', 'max:255'],
        ];
    }
}
