@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Recordatorio</h2>

    <form action="{{ route('recordatorios.update', $recordatorio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio"
                   class="form-control"
                   value="{{ old('fecha_inicio', $recordatorio->fecha_inicio ? date('Y-m-d\TH:i', strtotime($recordatorio->fecha_inicio)) : '') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de fin</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin"
                   class="form-control"
                   value="{{ old('fecha_fin', $recordatorio->fecha_fin ? date('Y-m-d\TH:i', strtotime($recordatorio->fecha_fin)) : '') }}" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="completado" id="completado" {{ $recordatorio->completado ? 'checked' : '' }}>
            <label class="form-check-label" for="completado">
                Marcar como completado
            </label>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Recordatorio</button>
    </form>
</div>
@endsection
