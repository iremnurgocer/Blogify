<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Tüm blog gönderilerini listeleme
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Yeni bir gönderi oluşturma formu
    public function create()
    {
        return view('posts.create');
    }

    // Yeni gönderiyi kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => 1, // Giriş yapan kullanıcının ID'si
            'is_edited' => false,    // Yeni bir post olduğundan false
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Gönderiyi düzenleme formu
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Düzenlenen gönderiyi kaydetme
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_edited' => true,
            'edit_user_id' => 1, // Düzenleyen kullanıcı ID'si
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');
    }

    // Gönderiyi silme
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
