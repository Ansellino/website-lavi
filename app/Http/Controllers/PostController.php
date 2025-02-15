<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // Load the post with its relationships
        $post->load(['user', 'media']);

        return view('posts.show', compact('post'));
    }
}
