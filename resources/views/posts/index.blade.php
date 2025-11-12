@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📚 Mis publicaciones</h1>
        <a href="{{ route('posts.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            ➕ Nueva publicación
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 rounded-lg px-4 py-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2 text-left">Título</th>
                <th class="px-4 py-2 text-left">Contenido</th>
                <th class="px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="border-t">
                    <td class="px-4 py-2 font-semibold">{{ $post->title }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ Str::limit($post->content, 50) }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">👁 Ver</a>
                        <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600 hover:underline">✏️ Editar</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar esta publicación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">🗑 Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-gray-500">No hay publicaciones aún.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
