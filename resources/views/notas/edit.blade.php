@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">✏️ Editar nota</h1>

        <form action="{{ route('notas.update', $nota) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Título --}}
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo"
                    value="{{ old('titulo', $nota->titulo) }}"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-blue-400 focus:border-blue-400 transition"
                    placeholder="Escribe el título de la nota"
                    required
                >
                @error('titulo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contenido --}}
            <div>
                <label for="contenido" class="block text-sm font-medium text-gray-700 mb-2">Contenido</label>
                <textarea 
                    name="contenido" 
                    id="contenido" 
                    rows="6"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-blue-400 focus:border-blue-400 transition"
                    placeholder="Escribe el contenido de la nota"
                    required
                >{{ old('contenido', $nota->contenido) }}</textarea>
                @error('contenido')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('notas.index') }}" 
                   class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                   Volver
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                        Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
