<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h1>List of Students</h1>

    <!-- Formulaire pour ajouter un étudiant -->
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="matriculation_number">Matriculation Number:</label>
        <input type="text" name="matriculation_number" required>
        <button type="submit">Add Student</button>
    </form>

    <!-- Afficher les messages de succès -->
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <!-- Tableau des étudiants -->
    <table border="1">
        <thead>
            <tr>
                <th>Matriculation Number</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->matriculation_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        <!-- Formulaire pour supprimer un étudiant -->
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
