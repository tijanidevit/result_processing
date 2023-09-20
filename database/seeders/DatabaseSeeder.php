<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Exam Admin',
            'role' => UserRoleEnum::ADMIN,
            'email' => 'admin@fpi.com',
        ]);

        $this->call(LevelSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(SemesterSeeder::class);

        $this->call(CourseSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(LecturerSeeder::class);
        $this->call(DepartmentLecturerSeeder::class);
        $this->call(DepartmentCourseSeeder::class);
        $this->call(LecturerCourseSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
