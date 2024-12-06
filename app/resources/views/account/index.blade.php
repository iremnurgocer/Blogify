@extends('layouts.app')

@section('title', 'Hesabım')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Hesap Bilgilerim</h1>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Adınız</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-posta</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Yeni Şifre (Opsiyonel)</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Şifre Tekrarı</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-500 transition">
                    Bilgilerimi Güncelle
                </button>
            </form>
        </div>
    </div>
@endsection
