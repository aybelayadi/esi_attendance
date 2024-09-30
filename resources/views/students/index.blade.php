<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>Student List</title>


    
  
</head>
<body>

    <div class="wrapper">
        
        <div class="content">
            <div class="title-div">
                <h1>List of Students</h1>
            </div>

            <div class="container">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Enter student name" required>
                    <label for="matriculation_number">Matriculation Number:</label>
                    <input type="text" name="matriculation_number" placeholder="Enter matriculation number" required>
                    <button type="submit">Add Student</button>
                </form>

                @if(session('success'))
                    <p style="color:green;">{{ session('success') }}</p>
                @endif

            
                <table>
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
            </div>
        </div>

      
        <footer class="footer">
            <p>&copy; PRJG5 - Ayoub EL AYADI, Adame Meert , Ayman EL GHZAOUI</p>
        </footer>
    </div>

</body>
</html>
