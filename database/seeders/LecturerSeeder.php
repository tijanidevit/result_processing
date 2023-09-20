<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => "Abuoye Peter",
            'email' => 'peter@fpi.com',
            'role' => UserRoleEnum::LECTURER,
        ]);


    }
}
