<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Recordatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::where('user_id', Auth::id())->with('recordatorio')->get();
        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        return view('notas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        $nota = Nota::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        Recordatorio::create([
            'nota_id' => $nota->id,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota creada correctamente.');
    }

    public function show(Nota $nota)
    {
        $this->authorize('view', $nota);
        return view('notas.show', compact('nota'));
    }

    public function edit(Nota $nota)
    {
        $this->authorize('update', $nota);
        return view('notas.edit', compact('nota'));
    }

    public function update(Request $request, Nota $nota)
    {
        $this->authorize('update', $nota);

        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        $nota->update($request->only('titulo', 'contenido'));

        return redirect()->route('notas.index')->with('success', 'Nota actualizada.');
    }

    public function destroy(Nota $nota)
    {
        $this->authorize('delete', $nota);
        $nota->delete();
        return redirect()->route('notas.index')->with('success', 'Nota eliminada.');
    }
}

