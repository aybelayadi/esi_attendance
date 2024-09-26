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

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'number' => 'required|integer|unique:students,matriculation_number', // Assurez-vous que le champ est unique
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        
        $student = Student::create([
            'matriculation_number' => $validatedData['number'],
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
        ]);

        
        return response()->json($student, 201);
    }
}
