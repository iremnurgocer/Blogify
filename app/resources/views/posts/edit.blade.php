@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $post->content }}</textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-500 transition">Update Post</button>
            </div>
        </form>
    </div>
@endsection
