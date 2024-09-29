<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h1>List of Students</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Matriculation Number</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->matriculation_number }}</td>
                    <td>{{ $student->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>