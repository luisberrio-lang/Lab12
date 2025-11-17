@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">✏️ Editar Actividad</h1>

    <form action="{{ route('recordatorios.actividades.update', [$recordatorio, $actividad]) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2 font-semibold">Descripción</label>
        <input type="text" name="descripcion" value="{{ old('descripcion', $actividad->descripcion) }}"
               class="w-full border px-3 py-2 rounded mb-4">
        @error('descripcion')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <label class="block mb-2 font-semibold">Estado</label>
        <select name="estado" class="w-full border px-3 py-2 rounded mb-4">
            <option value="pendiente" {{ $actividad->estado=='pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en progreso" {{ $actividad->estado=='en progreso' ? 'selected' : '' }}>En progreso</option>
            <option value="completado" {{ $actividad->estado=='completado' ? 'selected' : '' }}>Completado</option>
        </select>
        @error('estado')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <label class="block mb-2 font-semibold">Fecha Inicio</label>
        <input type="datetime-local" name="fecha_inicio"
               value="{{ old('fecha_inicio', $actividad->fecha_inicio ? $actividad->fecha_inicio->format('Y-m-d\TH:i') : '') }}"
               class="w-full border px-3 py-2 rounded mb-4">

        <label class="block mb-2 font-semibold">Fecha Fin</label>
        <input type="datetime-local" name="fecha_fin"
               value="{{ old('fecha_fin', $actividad->fecha_fin ? $actividad->fecha_fin->format('Y-m-d\TH:i') : '') }}"
               class="w-full border px-3 py-2 rounded mb-4">

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 p
