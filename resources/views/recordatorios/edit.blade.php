@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">✏️ Editar recordatorio</h1>

    <form action="{{ route('recordatorios.update', $recordatorio) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">
                Fecha vencimiento
            </label>
            <input type="datetime-local"
                   name="fecha_fin"
                   id="fecha_fin"
                   value="{{ old('fecha_fin', optional($recordatorio->fecha_fin)->format('Y-m-d\TH:i')) }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('fecha_fin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">
                Fecha inicio (opcional)
            </label>
            <input type="datetime-local"
                   name="fecha_inicio"
                   id="fecha_inicio"
                   value="{{ old('fecha_inicio', optional($recordatorio->fecha_inicio)->format('Y-m-d\TH:i')) }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('fecha_inicio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox"
                   name="completado"
                   id="completado"
                   {{ old('completado', $recordatorio->completado) ? 'checked' : '' }}>
            <label for="completado" class="text-sm text-gray-700">Marcar como completado</label>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Actualizar
            </button>
            <a href="{{ route('notas.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">
                Volver
            </a>
        </div>
    </form>
</div>
@endsection

