<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-10 px-6">
    <!-- Geri Dön ve İşlem Butonları -->
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition">Back to Posts</a>
        <div class="flex space-x-4">
            <!-- Edit Button -->
            <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-400 transition">Edit</a>
            <!-- Delete Form -->
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-400 transition">Delete</button>
            </form>
        </div>
    </div>

    <!-- Post Detayı -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-6">Published on {{ $post->created_at->format('F d, Y') }}</p>
        <div class="text-gray-700 leading-relaxed">
            {{ $post->content }}
        </div>
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
