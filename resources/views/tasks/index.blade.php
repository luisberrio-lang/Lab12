<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
</head>
<body>
    <h1>Mis Tareas</h1>
    <a href="{{ route('tasks.create') }}">➕ Nueva tarea</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->description }}
                <a href="{{ route('tasks.edit', $task) }}">✏️ Editar</a>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑 Eliminar</button>
                </form>
            </li>
        @empty
            <li>No hay tareas todavía.</li>
        @endforelse
    </ul>
</body>
</html>
