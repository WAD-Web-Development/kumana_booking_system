<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomTypeRequest extends FormRequest
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
            'room_count'  => 'required',
            'max_people_count'  => 'required',
            'price'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'room_count' => 'Room Count',
            'max_people_count' => 'Max People Count',
            'price' => 'Price',
        ];
    }
}
