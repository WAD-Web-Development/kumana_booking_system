<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSafariBookingPriceRequest extends FormRequest
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
            'half_day_price'  => 'required',
            'full_day_price'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'half_day_price' => 'Half Day Price',
            'full_day_price' => 'Full Day Price',
        ];
    }
}
