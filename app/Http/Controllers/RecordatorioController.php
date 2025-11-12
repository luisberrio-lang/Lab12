<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use App\Models\Nota;
use Illuminate\Http\Request;

class RecordatorioController extends Controller
{
    public function create(Nota $nota)
    {
        return view('recordatorios.create', compact('nota'));
    }

    public function store(Request $request, Nota $nota)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Recordatorio::create([
            'nota_id' => $nota->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'completado' => false,
        ]);

        return redirect()->route('notas.index')->with('success', 'Recordatorio creado correctamente.');
    }

    public function edit(Recordatorio $recordatorio)
    {
        return view('recordatorios.edit', compact('recordatorio'));
    }

    public function update(Request $request, Recordatorio $recordatorio)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'completado' => 'boolean',
        ]);

        $recordatorio->update([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'completado' => $request->has('completado'),
        ]);

        return redirect()->route('notas.index')->with('success', 'Recordatorio actualizado correctamente.');
    }

    public function destroy(Recordatorio $recordatorio)
    {
        $recordatorio->delete();
        return redirect()->route('notas.index')->with('success', 'Recordatorio eliminado correctamente.');
    }
}
