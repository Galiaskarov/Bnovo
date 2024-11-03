<?php

namespace App\Http\Requests\Guests;

use App\Models\Enums\GuestEnum;
use Illuminate\Foundation\Http\FormRequest;

class GuestUpdateRequest extends FormRequest
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
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'nullable|email|unique:guests,email,' . $this->route('guest'),
            'phone' => [
                'nullable',
                'string',
                'regex:/^\+\d{1,5}-\d{3}-\d{3}-\d{2}-\d{2}$/',
                'unique:guests,phone,' . $this->route('guest')
            ],
            'country' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.string' => GuestEnum::VALIDATE_MESSAGES['first_name']['string'],
            'first_name.max' => GuestEnum::VALIDATE_MESSAGES['first_name']['max'],
            'last_name.string' => GuestEnum::VALIDATE_MESSAGES['last_name']['string'],
            'last_name.max' => GuestEnum::VALIDATE_MESSAGES['last_name']['max'],
            'email.email' => GuestEnum::VALIDATE_MESSAGES['email']['email'],
            'email.unique' => GuestEnum::VALIDATE_MESSAGES['email']['unique'],
            'phone.regex' => GuestEnum::VALIDATE_MESSAGES['phone']['regex'],
            'phone.unique' => GuestEnum::VALIDATE_MESSAGES['phone']['unique'],
            'country.string' => GuestEnum::VALIDATE_MESSAGES['country']['string'],
            'country.max' => GuestEnum::VALIDATE_MESSAGES['country']['max'],
        ];
    }
}
