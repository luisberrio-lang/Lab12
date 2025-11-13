@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">⏰ Crear recordatorio</h1>

    <p class="mb-4 text-gray-700">
        Nota: <span class="font-semibold">{{ $nota->titulo }}</span>
    </p>

    <form action="{{ route('recordatorios.store', $nota) }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">
                Fecha vencimiento
            </label>
            <input type="datetime-local"
                   name="fecha_fin"
                   id="fecha_fin"
                   value="{{ old('fecha_fin') }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('fecha_fin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- opcional: fecha_inicio si la quieres usar --}}
        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">
                Fecha inicio (opcional)
            </label>
            <input type="datetime-local"
                   name="fecha_inicio"
                   id="fecha_inicio"
                   value="{{ old('fecha_inicio') }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('fecha_inicio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
                Guardar
            </button>
            <a href="{{ route('notas.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection

