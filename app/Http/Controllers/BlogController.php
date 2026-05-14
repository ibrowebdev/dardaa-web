<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->latest('published_at')
            ->get();
        $categories = Post::select('category')->distinct()->pluck('category');

        return view('pages.blog.index', compact('posts', 'categories'));
    }

    public function show(Post $slug)
    {
        $post = $slug;
        $relatedPosts = $post->relatedPosts(3);

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
