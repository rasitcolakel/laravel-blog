<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 60, function () {
            return Post::paginate(10);
        });
        return view('posts.index',
            [
                'posts' => $posts
            ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')->withErrors($validator->errors())
                ->withInput();
        }
        $validated = $validator->validated();
        $newPost = Post::create($validated);

        session()->flash('success', 'Data has been stored successfully.');
        return redirect()->route('posts.index')->with('toast', true);
    }
}
