<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Recordatorio;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index(Recordatorio $recordatorio)
    {
        $actividades = $recordatorio->actividades;
        return view('actividades.index', compact('actividades', 'recordatorio'));
    }

    public function create(Recordatorio $recordatorio)
    {
        return view('actividades.create', compact('recordatorio'));
    }

    public function store(Request $request, Recordatorio $recordatorio)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,en progreso,completado',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $recordatorio->actividades()->create($request->all());

        return redirect()->route('recordatorios.actividades.index', $recordatorio)
                         ->with('success', 'Actividad creada correctamente');
    }

    public function edit(Recordatorio $recordatorio, Actividad $actividad)
    {
        return view('actividades.edit', compact('recordatorio', 'actividad'));
    }

    public function update(Request $request, Recordatorio $recordatorio, Actividad $actividad)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,en progreso,completado',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $actividad->update($request->all());

        return redirect()->route('recordatorios.actividades.index', $recordatorio)
                         ->with('success', 'Actividad actualizada correctamente');
    }

    public function destroy(Recordatorio $recordatorio, Actividad $actividad)
    {
        $actividad->delete();

        return redirect()->route('recordatorios.actividades.index', $recordatorio)
                         ->with('success', 'Actividad eliminada correctamente');
    }
}
