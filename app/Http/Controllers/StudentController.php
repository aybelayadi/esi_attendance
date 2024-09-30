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

    // Méthode pour ajouter un étudiant
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'matriculation_number' => 'required|string|max:255|unique:students',
        ]);

        // Créer un nouvel étudiant
        Student::create($request->only('name', 'matriculation_number'));

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    // Méthode pour supprimer un étudiant
    public function destroy(Student $student)
    {
        // Supprimer l'étudiant
        $student->delete();

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
