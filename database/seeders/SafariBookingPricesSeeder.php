<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SafariBookingPrice;

class SafariBookingPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Tourist Visa
            [
                'visa_type' => 'Tourist',
                'group_type' => 'Solo',
                'person_count' => 1,
                'half_day_price' => 46000,
                'full_day_price' => 82500,
            ],
            [
                'visa_type' => 'Tourist',
                'group_type' => 'Couples',
                'person_count' => 2,
                'half_day_price' => 27000,
                'full_day_price' => 48500,
            ],
            [
                'visa_type' => 'Tourist',
                'group_type' => 'Triple',
                'person_count' => 3,
                'half_day_price' => 24000,
                'full_day_price' => 38000,
            ],
            [
                'visa_type' => 'Tourist',
                'group_type' => 'Groups',
                'person_count' => 4,
                'half_day_price' => 19500,
                'full_day_price' => 35000,
            ],
            // Resident Visa
            [
                'visa_type' => 'Resident',
                'group_type' => 'Solo',
                'person_count' => 1,
                'half_day_price' => 39000,
                'full_day_price' => 70000,
            ],
            [
                'visa_type' => 'Resident',
                'group_type' => 'Couples',
                'person_count' => 2,
                'half_day_price' => 19500,
                'full_day_price' => 40500,
            ],
            [
                'visa_type' => 'Resident',
                'group_type' => 'Triple',
                'person_count' => 3,
                'half_day_price' => 15000,
                'full_day_price' => 30500,
            ],
            [
                'visa_type' => 'Resident',
                'group_type' => 'Groups',
                'person_count' => 4,
                'half_day_price' => 13000,
                'full_day_price' => 26500,
            ],
        ];

        foreach ($data as $row) {
            SafariBookingPrice::create($row);
        }

    }
}
