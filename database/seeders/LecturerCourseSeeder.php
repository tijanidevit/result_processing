<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\LecturerCourse;
use App\Models\User;
use Illuminate\Database\Seeder;

class LecturerCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturer = User::firstWhere('role', UserRoleEnum::LECTURER);

        LecturerCourse::create([
            'department_course_id' => 1,
            'user_id' => $lecturer->id,
        ]);


    }
}
