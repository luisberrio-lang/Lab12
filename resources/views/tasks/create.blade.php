<!DOCTYPE html>
<html>
<head>
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>Crear nueva tarea</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Título:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('tasks.index') }}">⬅️ Volver</a>
</body>
</html>
