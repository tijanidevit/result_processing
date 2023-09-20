<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\DepartmentLecturer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentLecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturer = User::firstWhere('role', UserRoleEnum::LECTURER);
        DepartmentLecturer::create([
            'department_id' => 1,
            'user_id' => $lecturer->id,
        ]);


    }
}
