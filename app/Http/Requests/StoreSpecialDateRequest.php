<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecialDateRequest extends FormRequest
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
            'start_date'  => 'required',
            'end_date'  => 'required|date|after_or_equal:start_date',
            'description'  => 'nullable',
            'is_half_day'  => 'nullable',
            'is_closed'  => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10240',
            'day_time' => 'required_if:is_half_day,1',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'is_full_day' => 'Is Full Day',
            'is_closed' => 'Is Closed',
            'image' => 'Image',
            'day_time' => 'Day Time',
        ];
    }
}
