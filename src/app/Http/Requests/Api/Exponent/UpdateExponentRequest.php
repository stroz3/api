<?php

namespace App\Http\Requests\Api\Exponent;

class UpdateExponentRequest extends CreateExponentRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'slug' => ['sometimes', 'string', 'max:255', 'unique:exponents'],
            'short_desc' => ['sometimes', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'full_desc' => ['sometimes', 'string'],
            'logo' => ['sometimes', 'file', 'image', 'max:2000'],
            'main_img' => ['sometimes', 'file', 'image', 'max:2000'],
            'website_link' => ['sometimes', 'string'],
            'contacts' => ['sometimes', 'array'],
            'contacts.*' => ['sometimes', 'array'],
            'contacts.*.type' => ['sometimes', 'string', 'in:phone,email'],
            'contacts.*.value' => ['sometimes', 'string', 'max:255'],
            'inn' => ['sometimes', 'digits:12', 'unique:exponents'],
            'kpp' => ['nullable', 'digits:9'],
            'ogrn' => ['nullable', 'digits:13'],
            'business_address' => ['nullable', 'string', 'max:255'],
            'production_address' => ['nullable', 'string', 'max:255'],
            'is_import_substitution' => ['sometimes', 'boolean'],
            'active' => ['sometimes', 'boolean'],
            'sector_id' => ['sometimes', 'exists:sectors,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'verification_status' => ['sometimes', 'int', 'in:0,1,2'],
            'verification_comment' => ['nullable', 'string', 'max:255'],
        ];
    }
}
