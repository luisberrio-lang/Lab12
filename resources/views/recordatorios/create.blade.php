@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Recordatorio</h2>

    <form action="{{ route('recordatorios.store', $nota->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de fin</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Recordatorio</button>
    </form>
</div>
@endsection
