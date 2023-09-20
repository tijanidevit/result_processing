<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert(['name' => "Pure and Applied Science"]);
        DB::table('schools')->insert(['name' => "Communication And Information Technology"]);
        DB::table('schools')->insert(['name' => "Engineering"]);
        DB::table('schools')->insert(['name' => "Environmental Studies"]);
        DB::table('schools')->insert(['name' => "Management Studies"]);
    }
}
