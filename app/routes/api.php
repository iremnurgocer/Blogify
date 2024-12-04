<?php
use App\Models\Post;
use Illuminate\Http\Request;

Route::get('/posts', function () {
    return Post::all();
});
