@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-3xl p-10 border-l-4 border-yellow-400">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">✏️ Editar publicación</h1>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Campo: Título --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $post->title) }}"
                    class="block w-full border border-gray-300 rounded-2xl shadow-md p-3 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-400 transition-all"
                    placeholder="Ingresa el título de la publicación"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Campo: Contenido --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido</label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="6"
                    class="block w-full border border-gray-300 rounded-2xl shadow-md p-3 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-400 transition-all"
                    placeholder="Escribe aquí el contenido de la publicación"
                    required
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('posts.index') }}" 
                   class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded-2xl shadow-md hover:scale-105 transition-transform">
                   Volver
                </a>
                <button type="submit" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-2xl shadow-md hover:scale-105 transition-transform">
                        Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
