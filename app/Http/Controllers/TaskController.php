<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar todas las tareas
    public function index()
    {
        // Si todavía no tienes autenticación (login/registro), 
        // usa Task::all(). Cuando instales Breeze, vuelve a activar la línea con auth().
        
        // $tasks = Task::where('user_id', auth()->id())->get();
        $tasks = Task::all(); // ← Usa esta si aún no hay login
        
        return view('tasks.index', compact('tasks'));
    }

    // Mostrar formulario para crear una nueva tarea
    public function create()
    {
        return view('tasks.create');
    }

    // Guardar una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            // 'user_id' => auth()->id(), // ← Descomenta cuando actives login
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    // Mostrar formulario para editar una tarea
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Actualizar una tarea existente
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    // Eliminar una tarea
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
