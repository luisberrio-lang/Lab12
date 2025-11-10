<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <div class="bg-white w-full max-w-3xl p-8 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mis Tareas</h1>
            <a href="{{ route('tasks.create') }}"
               class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center gap-1">
               ➕ Nueva tarea
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-medium text-sm bg-green-100 border border-green-300 rounded-lg p-3">
                {{ session('success') }}
            </div>
        @endif

        <ul class="divide-y divide-gray-200">
            @forelse($tasks as $task)
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h2>
                        <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="text-indigo-600 hover:text-indigo-800 transition text-sm font-medium">
                           ✏️ Editar
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 transition text-sm font-medium">
                                🗑 Eliminar
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="py-4 text-gray-500 text-center">No hay tareas todavía.</li>
            @endforelse
        </ul>
    </div>

</body>
</html>

