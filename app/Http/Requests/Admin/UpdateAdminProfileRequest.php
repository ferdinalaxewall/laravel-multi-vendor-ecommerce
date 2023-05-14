<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = auth()->user()->id;

        return [
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'photo' => 'nullable|image',
            'phone' => 'nullable|sometimes|numeric',
            'address' => 'nullable|sometimes|string|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email Address',
            'photo' => 'Photo Profile',
            'phone' => 'Phone Number',
            'address' => 'Address'
        ];
    }
}
