<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blogify')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gray-800 text-white py-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <x-navbar />
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto py-10 px-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif



        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Blogify. All rights reserved.</p>
            <div class="flex justify-center mt-4 space-x-6">
                <a href="https://github.com/iremnurgocer" class="hover:underline" target="_blank">GitHub</a>
                <a href="https://tr.linkedin.com/in/iremnurgocer" class="hover:underline" target="_blank">LinkedIn</a>
                <a href="https://iremnurgocer.github.io/" class="hover:underline" target="_blank">Website</a>
                <a href="mailto:iremnurgocer99@gmail.com" class="hover:underline">Email</a>
            </div>
        </div>
    </footer>
</body>
</html>
