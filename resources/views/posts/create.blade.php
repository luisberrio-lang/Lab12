@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">➕ Crear nueva publicación</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="content" id="content" rows="5"
                      class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('content') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">Guardar</button>
            <a href="{{ route('posts.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">Cancelar</a>
        </div>
    </form>
</div>
@endsection
