@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">⏰ Editar recordatorio</h1>

    <form action="{{ route('recordatorios.update', $recordatorio) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-700">Fecha de vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento"
                   value="{{ old('fecha_vencimiento', $recordatorio->fecha_vencimiento) }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="completado" id="completado"
                   {{ $recordatorio->completado ? 'checked' : '' }}
                   class="rounded text-blue-600 focus:ring-blue-500">
            <label for="completado" class="text-sm text-gray-700">Marcar como completado</label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">Guardar cambios</button>
            <a href="{{ route('notas.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">Volver</a>
        </div>
    </form>
</div>
@endsection
