<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Lessons</title>
</head>
<body>

    <div class="wrapper">
    
        <div class="title-div">
            <h1>List of Scheduled Lessons</h1>
        </div>

        <nav class="navbar">
                <ul>
                    <li><a href="{{ route('students.index') }}">Students</a></li>
                    <li><a href="{{ route('lessons.index') }}">Lessons</a></li>
                </ul>
            </nav>


        <div class="content">
            <table border="1">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->course }}</td>
                            <td>{{ \Carbon\Carbon::parse($lesson->date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($lesson->time)->format('H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        <footer class="footer">
            <p> </p>
        </footer>
    </div>

</body>
</html>
