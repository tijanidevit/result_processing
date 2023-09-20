<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sessions')->insert(['name' => "2022/2023"]);
        DB::table('sessions')->insert(['name' => "2023/2024"]);
    }
}
