<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
        }

        $posts = $query->latest()->paginate(15)->appends($request->query());

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('blog', $filename, 'public');
            $data['thumbnail'] = '/storage/' . $path;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                $oldPath = str_replace('/storage/', '', $post->thumbnail);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('thumbnail');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('blog', $filename, 'public');
            $data['thumbnail'] = '/storage/' . $path;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            $oldPath = str_replace('/storage/', '', $post->thumbnail);
            Storage::disk('public')->delete($oldPath);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully.');
    }
}
