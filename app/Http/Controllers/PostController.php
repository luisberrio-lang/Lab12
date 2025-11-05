<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Requiere autenticación
    }

    public function index()
    {
        $posts = Post::with('user')->get(); // Carga posts con sus usuarios
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        //Es un filtro de malas palabras - Marco Figueroa
        $prohibitedWords = ['mala palabra1', 'mala palabra2'];

        foreach ($prohibitedWords as $word) {
            if (stripos($request->content, $word) !== false) {
                return back()->withErrors(['content' => 'El contenido contiene palabras no permitidas.'])->withInput();
            }
        }
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación creada.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Publicación eliminada.');
    }
}

