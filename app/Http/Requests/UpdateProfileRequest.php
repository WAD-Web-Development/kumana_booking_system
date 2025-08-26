<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $userId = auth()->id();

        return [
            'name'  => 'required',
            'email'  => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
            'nationality'  => 'required',
            'contact_no'  => 'required',
            'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'profile_image' => 'Profile Image',
            'nationality' => 'Nationality',
            'email' => 'Email',
            'contact_no' => 'Phone Number',
        ];
    }
}
