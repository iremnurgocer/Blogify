<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-10 px-6">
    <!-- Flash Mesaj -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Başlık ve Yeni Post Butonu -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition">Create New Post</a>
    </div>

    <!-- Post Listesi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl hover:scale-100 transition transform duration-300 hover:scale-120">
                <a href="{{ route('posts.show', $post) }}" class="block text-indigo-500 text-xl transition-transform duration-300 hover:scale-105">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                    <p class="text-gray-500 text-sm">Published by User #{{ $post->user_id }}</p>
                    <p class="text-gray-500 text-sm">
                        Edited: {{ $post->is_edited ? 'Yes' : 'No' }}
                        @if ($post->is_edited)
                            by User #{{ $post->edit_user_id }}
                        @endif
                    </p>
                    <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 100) }}</p>
                </a>
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('posts.edit', $post) }}" class="block text-blue-500 transition-transform duration-300 hover:scale-110">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500  transition-transform duration-300 hover:scale-110">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 mt-10">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Blogify. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
