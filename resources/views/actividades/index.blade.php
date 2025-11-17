@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        📝 Actividades de: {{ $recordatorio->nota->titulo ?? 'Recordatorio' }}
    </h1>

    <a href="{{ route('recordatorios.actividades.create', $recordatorio) }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mb-6 inline-block">
        ➕ Nueva actividad
    </a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($actividades->isEmpty())
        <p class="text-gray-600">No hay actividades aún.</p>
    @else
        <div class="grid gap-4">
            @foreach ($actividades as $actividad)
                <div class="p-5 bg-white shadow rounded-xl">
                    <p class="text-gray-800 font-semibold">{{ $actividad->descripcion }}</p>
                    <p class="text-sm text-gray-600">
                        Estado: 
                        <span class="{{ $actividad->estado === 'completado' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($actividad->estado) }}
                        </span>
                    </p>
                    @if($actividad->fecha_inicio)
                        <p class="text-sm text-gray-500">
                            Inicio: {{ $actividad->fecha_inicio->format('d/m/Y H:i') }}
                        </p>
                    @endif
                    @if($actividad->fecha_fin)
                        <p class="text-sm text-gray-500">
                            Fin: {{ $actividad->fecha_fin->format('d/m/Y H:i') }}
                        </p>
                    @endif

                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('recordatorios.actividades.edit', [$recordatorio, $actividad]) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            Editar
                        </a>

                        <form action="{{ route('recordatorios.actividades.destroy', [$recordatorio, $actividad]) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar actividad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
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
