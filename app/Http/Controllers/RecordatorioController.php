<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use App\Models\Nota;
use Illuminate\Http\Request;

class RecordatorioController extends Controller
{
    public function edit(Recordatorio $recordatorio)
    {
        return view('recordatorios.edit', compact('recordatorio'));
    }

    public function update(Request $request, Recordatorio $recordatorio)
    {
        $request->validate([
            'fecha_vencimiento' => 'nullable|date',
            'completado' => 'boolean',
        ]);

        $recordatorio->update([
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'completado' => $request->has('completado'),
        ]);

        return redirect()->route('notas.index')->with('success', 'Recordatorio actualizado.');
    }
}
