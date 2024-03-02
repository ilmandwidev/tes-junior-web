<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("candidates")
            ->insert([
                'name' => 'junior',
                'email' => 'junior@gmail.com',
                'phone' => '123456',
                'years' => '2023',
                'job_id' => '3',

            ]);
    }
}
