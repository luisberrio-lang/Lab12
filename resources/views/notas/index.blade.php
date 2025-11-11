@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">📝 Mis Notas</h1>

    <a href="{{ route('notas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mb-6 inline-block">
        ➕ Nueva nota
    </a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($notas->isEmpty())
        <p class="text-gray-600">No tienes notas aún.</p>
    @else
        <div class="grid gap-4">
            @foreach ($notas as $nota)
                <div class="p-5 bg-white shadow rounded-xl">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $nota->titulo }}</h2>
                    <p class="text-gray-700 mt-2">{{ $nota->contenido }}</p>

                    @if ($nota->recordatorio)
                        <div class="text-sm text-gray-600 mt-3">
                            ⏰ Fecha: {{ $nota->recordatorio->fecha_vencimiento ?? 'Sin fecha' }} |
                            Estado: 
                            <span class="{{ $nota->recordatorio->completado ? 'text-green-600' : 'text-red-600' }}">
                                {{ $nota->recordatorio->completado ? '✅ Completado' : '❌ Pendiente' }}
                            </span>
                        </div>

                        <a href="{{ route('recordatorios.edit', $nota->recordatorio) }}"
                           class="mt-2 inline-block text-sm text-blue-600 hover:text-blue-800">Editar recordatorio</a>
                    @endif

                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('notas.edit', $nota) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>

                        <form action="{{ route('notas.destroy', $nota) }}" method="POST" onsubmit="return confirm('¿Eliminar nota?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

