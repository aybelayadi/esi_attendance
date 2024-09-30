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

    // Méthode pour ajouter un étudiant
    public function store(Request $request)
    {
         $request->validate([
             'name' => 'required|string|max:255',
             'matriculation_number' => 'required|string|max:255|unique:students',
         ]);

          $student = Student::create($request->only('name', 'matriculation_number'));
    
    
     return response()->json([
        'message' => 'Student added successfully.',
         'student' => $student,
     ], 201); 
    }


    // Méthode pour supprimer un étudiant
    public function destroy(Student $student)
    {

        $student->delete();

        //return redirect()->route('students.index')->with('success', 'Student deleted successfully.');

        return response()->json([
            'message' => 'Student deleted successfully.',
             'student' => $student,
         ], 204); 
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }

}
