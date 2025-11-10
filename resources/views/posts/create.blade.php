@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-2xl p-8 mt-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Publicación</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Título</label>
            <input 
                type="text" 
                name="title" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                value="{{ old('title') }}" 
                required
            >
        </div>

        <div>
            <label for="content" class="block text-gray-700 font-semibold mb-2">Contenido</label>
            <textarea 
                name="content" 
                rows="5" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                required>{{ old('content') }}</textarea>
        </div>

        <div class="text-center">
            <button 
                type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg transition-all duration-200">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
