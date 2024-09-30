<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'Étudiant</title>
</head>
<body>
    <h1>Détails de l'Étudiant</h1>
    <p><strong>ID :</strong> {{ $student->id }}</p>
    <p><strong>Nom :</strong> {{ $student->name }}</p>
    <p><strong>Numéro de matriculation :</strong> {{ $student->matriculation_number }}</p>
    
    <a href="{{ route('students.index') }}">Retour à la liste des étudiants</a>
</body>
</html>
