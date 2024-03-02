<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("jobs")
            ->insert(['name' => 'Frontend Web Programmer']);
        DB::table("jobs")
            ->insert(['name' => 'Fullstack Web Programmer']);
        DB::table("jobs")
            ->insert(['name' => 'Quality Control']);
    }
}
