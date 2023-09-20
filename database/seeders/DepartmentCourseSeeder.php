<?php

namespace Database\Seeders;

use App\Models\DepartmentCourse;
use Illuminate\Database\Seeder;

class DepartmentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentCourse::create([
            'department_id' => 1,
            'semester_id' => 1,
            'level_id' => 4,
            'course_id' => 1,
        ]);


    }
}
