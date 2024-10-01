<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    public function run()
    {
        Lesson::create([
            'course' => 'PRGL',
            'date' => '2021-09-24',
            'time' => '13:30',
        ]);

        Lesson::create([
            'course' => 'MATH',
            'date' => '2021-09-25',
            'time' => '10:00',
        ]);
    }
}
