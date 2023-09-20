<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert(['name' => "First"]);
        DB::table('semesters')->insert(['name' => "Second"]);
    }
}
