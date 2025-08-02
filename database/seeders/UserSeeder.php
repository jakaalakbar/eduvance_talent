<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'name' => fake()->name(),
                'username' => fake()->userName(),
                'email' => fake()->email(),
                'is_active' => false,
                'role' => UserRole::UNKNOWN->value,
                'password' => Hash::make("password"),
            ];
        }
        DB::table('users')->insert($data);
    }
}
