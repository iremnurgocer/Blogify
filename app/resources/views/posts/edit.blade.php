<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-10 px-6">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition">Back to Posts</a>
        <div class="flex space-x-4">
        </div>
    </div>
</div>

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $post->content }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-500 transition">Update Post</button>
            </div>
        </form>
    </div>
</div>
<footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Blogify. All rights reserved.</p>
        <div class="flex justify-center mt-4 space-x-6">
            <a href="https://github.com/iremnurgocer" class="hover:underline" target="_blank">
                GitHub
            </a>
            <a href="https://tr.linkedin.com/in/iremnurgocer" class="hover:underline" target="_blank">
                LinkedIn
            </a>
            <a href="https://iremnurgocer.github.io/" class="hover:underline" target="_blank">
                Website
            </a>
            <a href="mailto:iremnurgocer99@gmail.com" class="hover:underline">
                Email
            </a>
        </div>
    </div>
</footer>
</body>
</html>
