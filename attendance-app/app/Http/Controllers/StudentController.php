<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('matriculation_number', 'asc')->get();
        
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'matriculation_number' => 'required|integer|unique:students,matriculation_number', 
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        

        
        $student = Student::create([
            'matriculation_number' => $validatedData['matriculation_number'],
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
        ]);
        

        
        return response()->json($student, 201);
    }
}
