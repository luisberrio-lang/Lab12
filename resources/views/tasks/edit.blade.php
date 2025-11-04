<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar tarea</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Título:</label><br>
        <input type="text" name="title" value="{{ $task->title }}" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="description">{{ $task->description }}</textarea><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('tasks.index') }}">⬅️ Volver</a>
</body>
</html>
