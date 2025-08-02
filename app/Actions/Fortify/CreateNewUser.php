<?php

namespace App\Actions\Fortify;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'username' => ['required', 'string', 'max:255', 'min:5', Rule::unique(User::class)],
            // 'email' => [
            //     'required',
            //     'string',
            //     'email',
            //     'max:255',
            //     Rule::unique(User::class),
            // ],
            'password' => ['required', 'string', 'max:25', 'min:5', $this->passwordRules()],
        ])->validate();

        return User::create([
            'name' => $input["name"],
            'username' => $input["username"],
            'email' => fake()->email(),
            'is_active' => false,
            'role' => UserRole::UNKNOWN->value,
            'password' => Hash::make($input["password"]),
        ]);
    }
}
