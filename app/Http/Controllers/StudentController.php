<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch all students, ordered by matriculation number
        $students = Student::orderBy('matriculation_number', 'asc')->get();
        
        // Pass the students to a view
        return view('students.index', compact('students'));
    }
}
