@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Panel principal</h1>

    <div class="grid grid-cols-3 gap-4">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-center">📚 Ver Posts</a>
        <a href="{{ route('notas.index') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center">📝 Ver Notas</a>
        <a href="{{ route('usuarios.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded text-center">👥 Ver Usuarios</a>
    </div>
</div>
@endsection
