<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function indexVue(): View
    {
        return view('postVue.index');
    }

    public function index(): View
    {
        $posts = auth()->user()->posts()->paginate(2);
        return view('post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        return redirect('/post')->with('success', 'Post is successfully created');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect('/post')->with('success', 'Post is successfully deleted');
    }

    public function show(Post $post): View
    {
        return view('post.view', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/post')->with('success', 'Post is successfully created');
    }
}
