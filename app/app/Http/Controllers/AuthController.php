<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/posts'); // Giriş yaptıktan sonra yönlendirilecek yer
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6', // En az 6 karakter
                'confirmed', // Confirm field ile eşleşme
            ],
        ], [
            'password.min' => 'The password must be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        try {
            // Kullanıcı oluşturma
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Kullanıcıyı giriş yaptırma
            Auth::login($user);

            // Başarılı mesaj ve yönlendirme
            return redirect()->route('posts.index')->with('success', 'Registration successful! You are now logged in.');
        } catch (\Exception $e) {
            // Hata durumunda mesaj
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
