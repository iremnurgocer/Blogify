@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Register</h1>

            <!-- Flash Messages -->
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

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <img id="toggle-password-1" src="{{ asset('storage/open-eye.png') }}" alt="Toggle Password"
                             class="absolute inset-y-0 right-3 w-5 h-5 my-auto cursor-pointer">
                    </div>
                </div>
                <div class="mb-6 relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <img id="toggle-password-2" src="{{ asset('storage/open-eye.png') }}" alt="Toggle Password"
                             class="absolute inset-y-0 right-3 w-5 h-5 my-auto cursor-pointer">
                    </div>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-500 transition">Register</button>
            </form>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // İlk şifre alanı
        const passwordField1 = document.getElementById('password');
        const togglePassword1 = document.getElementById('toggle-password-1');

        togglePassword1.addEventListener('click', () => {
            const isPassword = passwordField1.type === 'password';
            passwordField1.type = isPassword ? 'text' : 'password';
            togglePassword1.src = isPassword
                ? '{{ asset('storage/close-eye.png') }}'
                : '{{ asset('storage/open-eye.png') }}';
        });

        // Şifre doğrulama alanı
        const passwordField2 = document.getElementById('password_confirmation');
        const togglePassword2 = document.getElementById('toggle-password-2');

        togglePassword2.addEventListener('click', () => {
            const isPassword = passwordField2.type === 'password';
            passwordField2.type = isPassword ? 'text' : 'password';
            togglePassword2.src = isPassword
                ? '{{ asset('storage/close-eye.png') }}'
                : '{{ asset('storage/open-eye.png') }}';
        });
    });
</script>
