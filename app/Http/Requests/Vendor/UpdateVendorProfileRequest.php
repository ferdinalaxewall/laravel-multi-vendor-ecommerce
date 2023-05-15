<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorProfileRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.$id,
            'photo' => 'required|image',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:500',
            'vendor_short_info' => 'required|string|max:1000'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Shop Name',
            'email' => 'Vendor Email',
            'photo' => 'Photo Profile',
            'phone' => 'Vendor Phone Number',
            'address' => 'Vendor Address',
            'vendor_short_info' => 'Vendor Info'
        ];
    }
}
