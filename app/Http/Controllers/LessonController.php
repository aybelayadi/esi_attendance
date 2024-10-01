<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
    
        $lessons = Lesson::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return view('lessons.index', compact('lessons'));
    }
}
