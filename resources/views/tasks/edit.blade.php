<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Editar tarea
        </h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título:</label>
                <input type="text" id="title" name="title" value="{{ $task->title }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción:</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $task->description }}</textarea>
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('tasks.index') }}"
                   class="text-sm text-gray-600 hover:text-indigo-500 transition">
                   ⬅ Volver
                </a>

                <button type="submit"
                        class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</body>
</html>
