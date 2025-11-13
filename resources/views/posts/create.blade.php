@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">➕ Crear nueva publicación</h1>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Campo: Título --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Título</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}"
                    class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Campo: Contenido --}}
            <div>
                <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Contenido</label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="5"
                    class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    required
                >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('posts.index') }}" 
                   class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg transition">
                   Cancelar
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                        Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
