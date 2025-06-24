<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            'title'  => 'required',
            'description'  => 'nullable',
            'note'  => 'nullable',
            'type'  => 'required',
            'is_special'  => 'nullable',
            'start_date'  => 'nullable',
            'end_date'  => 'nullable',
            'safari_type'  => 'nullable',
            'safari_max_people_count'  => 'nullable',
            'room_type_id'  => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10240',
            'package_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'note' => 'Note',
            'type' => 'Type',
            'is_special' => 'Is Special',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'safari_type' => 'Safari Type',
            'safari_max_people_count' => 'Safari Max People Count',
            'room_type_id' => 'Room Type',
            'image' => 'Image',
            'package_images.*' => 'Image',
        ];
    }
}
