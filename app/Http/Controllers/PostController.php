<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Muestra la lista de publicaciones del usuario autenticado.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Muestra el formulario para crear una nueva publicación.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Guarda una nueva publicación en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Post::create([
            ...$validated,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Publicación creada correctamente.');
    }

    /**
     * Muestra una publicación específica.
     */
    public function show(Post $post)
    {
        $this->authorizePost($post);

        return view('posts.show', compact('post'));
    }

    /**
     * Muestra el formulario para editar una publicación existente.
     */
    public function edit(Post $post)
    {
        $this->authorizePost($post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Actualiza una publicación existente.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorizePost($post);

        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $post->update($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Elimina una publicación.
     */
    public function destroy(Post $post)
    {
        $this->authorizePost($post);

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Publicación eliminada correctamente.');
    }

    /**
     * Verifica que el post pertenezca al usuario autenticado.
     */
    private function authorizePost(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a esta publicación.');
        }
    }
}
