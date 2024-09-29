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
            ['name' => 'Michael Johnson', 'matriculation_number' => 'A003'],
            ['name' => 'Emily Davis', 'matriculation_number' => 'A004'],
            ['name' => 'David Brown', 'matriculation_number' => 'A005'],
            ['name' => 'Laura Wilson', 'matriculation_number' => 'A006'],
            ['name' => 'Peter Parker', 'matriculation_number' => 'A007'],
            ['name' => 'Mary Watson', 'matriculation_number' => 'A008'],
            ['name' => 'Robert Stark', 'matriculation_number' => 'A009'],
            ['name' => 'Anna Taylor', 'matriculation_number' => 'A010']
        ]);
    }
}
