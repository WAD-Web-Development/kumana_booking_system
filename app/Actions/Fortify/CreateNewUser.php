<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'contact_no' => ['required', 'string', 'max:20'],
            'nationality' => ['required', 'string', 'max:255'],
            'register_password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [], [
            'register_email' => 'email',
            'register_password' => 'password',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['register_email'],
            'contact_no' => $input['contact_no'],
            'nationality' => $input['nationality'],
            'password' => Hash::make($input['register_password']),
        ]);

        $user->assignRole('user');

        return $user;
    }
}
