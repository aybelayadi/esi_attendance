<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');