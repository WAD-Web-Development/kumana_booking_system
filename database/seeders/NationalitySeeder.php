<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Nationality;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = public_path('assets/file/countries.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("countries.json file not found at: $jsonPath");
            return;
        }

        $data = json_decode(File::get($jsonPath), true);

        foreach ($data as $item) {
            if (!empty($item['nationality']) && !empty($item['alpha_2_code'])) {
                Nationality::updateOrCreate(
                    ['country_code' => $item['alpha_2_code']],
                    ['name' => $item['nationality']]
                );
            }
        }
    }
}
