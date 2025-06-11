<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        $adminUsers = [
            [
                'name' => 'Admin1',
                'email' => 'admin1@mail.com',
                'password' => Hash::make('admin123'),
                'contact_no' => '+94111234561',
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@mail.com',
                'password' => Hash::make('admin123'),
                'contact_no' => '+94111234562',
            ],
            [
                'name' => 'Admin3',
                'email' => 'admin3@mail.com',
                'password' => Hash::make('admin123'),
                'contact_no' => '+94111234563',
            ],
        ];

        foreach ($adminUsers as $adminData) {
            $adminUser = User::firstOrCreate(
                ['email' => $adminData['email']],
                $adminData
            );

            if (!$adminUser->hasRole('admin')) {
                $adminUser->assignRole($adminRole);
            }
        }
    }
}
