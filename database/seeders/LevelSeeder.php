<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert(['name' => "ND 1"]);
        DB::table('levels')->insert(['name' => "ND 2"]);
        DB::table('levels')->insert(['name' => "HND 1"]);
        DB::table('levels')->insert(['name' => "HND 2"]);
    }
}
