@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">➕ Nueva Actividad</h1>

    <form action="{{ route('recordatorios.actividades.store', $recordatorio) }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold">Descripción</label>
        <input type="text" name="descripcion" value="{{ old('descripcion') }}"
               class="w-full border px-3 py-2 rounded mb-4">
        @error('descripcion')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <label class="block mb-2 font-semibold">Estado</label>
        <select name="estado" class="w-full border px-3 py-2 rounded mb-4">
            <option value="pendiente" {{ old('estado')=='pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en progreso" {{ old('estado')=='en progreso' ? 'selected' : '' }}>En progreso</option>
            <option value="completado" {{ old('estado')=='completado' ? 'selected' : '' }}>Completado</option>
        </select>
        @error('estado')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <label class="block mb-2 font-semibold">Fecha Inicio</label>
        <input type="datetime-local" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
               class="w-full border px-3 py-2 rounded mb-4">

        <label class="block mb-2 font-semibold">Fecha Fin</label>
        <input type="datetime-local" name="fecha_fin" value="{{ old('fecha_fin') }}"
               class="w-full border px-3 py-2 rounded mb-4">

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</div>
@endsection

