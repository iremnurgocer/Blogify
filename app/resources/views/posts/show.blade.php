@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-6">Published on {{ $post->created_at->format('F d, Y') }}</p>
        <div class="text-gray-700 leading-relaxed">
            {{ $post->content }}
        </div>
    </div>
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-400 transition">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-400 transition">Delete</button>
        </form>
    </div>
@endsection
