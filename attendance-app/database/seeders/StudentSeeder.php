<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            ['name' => 'John Doe', 'matriculation_number' => 'A001'],
            ['name' => 'Jane Smith', 'matriculation_number' => 'A002'],
            // Add more students
        ]);
    }
}
