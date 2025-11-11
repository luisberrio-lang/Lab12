@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">✏️ Editar nota</h1>

    <form action="{{ route('notas.update', $nota) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('titulo', $nota->titulo) }}" required>
            @error('titulo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="contenido" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="contenido" id="contenido" rows="5"
                      class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                      required>{{ old('contenido', $nota->contenido) }}</textarea>
            @error('contenido') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">Actualizar</button>
            <a href="{{ route('notas.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">Volver</a>
        </div>
    </form>
</div>
@endsection
