@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-2xl p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $post->content }}
            </p>

            <p class="text-sm text-gray-500 mb-6">
                Por: <span class="font-semibold text-gray-700">{{ $post->user->name }}</span>
            </p>

            <div class="flex justify-end">
                <a href="{{ route('posts.index') }}" 
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    ← Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
