<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTempBookingRequest extends FormRequest
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
            'location_lat' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
            ],
            'location_lng' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
            ],
            'safari_date' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
                'date',
            ],
            'safari_time' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
            ],
            'residence_visa' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
            ],
            'travel_visa' => [
                'required_if:package_type,1',
                'required_if:package_type,3',
            ],
            // 'room_check_in_date'  => 'required_if:package_type,2|required_if:package_type,3',
            // 'room_check_out_date'  => 'required_if:package_type,2|required_if:package_type,3',
            'number_of_rooms' => [
                'required_if:package_type,2',
                'required_if:package_type,3',
                'integer',
                'min:1',
            ],
            'customer_name'  => [
                'required'
            ],
            'contact_no' => [
                'required', 'regex:/^\+[0-9]{7,15}$/'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'location_lat' => 'Latitude',
            'location_lng' => 'Longitude',
            'safari_date' => 'Safari Date',
            'safari_time' => 'Safari Time',
            'number_of_customers' => 'Number of Customers',
            'residence_visa' => 'Residence Visa',
            'travel_visa' => 'Travel Visa',
            'room_check_in_date' => 'Check In Date',
            'room_check_out_date' => 'Check Out Date',
            'number_of_rooms' => 'Number of Rooms',
            'customer_name' => 'Customer Name',
            'contact_no' => 'Contact Number',
        ];
    }

    public function messages()
    {
        return [
            // Location fields
            'location_lat.required_if'        => 'The Latitude field is required.',
            'location_lng.required_if'        => 'The Longitude field is required.',

            // Safari fields
            'safari_date.required_if'         => 'The Safari Date field is required.',
            'safari_date.date'                => 'The Safari Date must be a valid date.',
            'safari_time.required_if'         => 'The Safari Time field is required.',
            'number_of_customers.required_if' => 'The Number of Customers field is required.',
            'number_of_customers.integer'     => 'The Number of Customers must be an integer.',
            'number_of_customers.min'         => 'The Number of Customers must be at least 1.',

            // Visa fields
            'residence_visa.required_if'      => 'The Residence Visa field is required.',
            'travel_visa.required_if'         => 'The Travel Visa field is required.',

            // Room fields
            'number_of_rooms.required_if'     => 'The Number of Rooms field is required.',
            'number_of_rooms.integer'         => 'The Number of Rooms must be an integer.',
            'number_of_rooms.min'             => 'The Number of Rooms must be at least 1.',

            // Customer info
            'customer_name.required'          => 'The Customer Name field is required.',
            'contact_no.required'             => 'The Contact Number field is required.',
            'contact_no.regex'                => 'The Contact Number format is invalid. It must start with + and contain 7–15 digits.',

            // check-in/out dates
            // 'room_check_in_date.required_if'  => 'The Check In Date field is required.',
            // 'room_check_out_date.required_if' => 'The Check Out Date field is required.',
        ];
    }

}
