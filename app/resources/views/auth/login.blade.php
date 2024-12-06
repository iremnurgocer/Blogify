@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pr-10">
                        <img id="toggle-password" src="{{ asset('storage/open-eye.png') }}" alt="Toggle Password"
                             class="absolute inset-y-0 right-3 w-5 h-5 my-auto cursor-pointer">
                    </div>
                </div>
                <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-500 transition">Login
                </button>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const passwordField = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            togglePassword.src = isPassword
                ? '{{ asset('storage/close-eye.png') }}'
                : '{{ asset('storage/open-eye.png') }}';
        });
    });
</script>
