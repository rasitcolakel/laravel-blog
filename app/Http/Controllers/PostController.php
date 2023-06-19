<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $order_by = $request->get('order_by', 'created_at');
        $order_direction = $request->get('order_direction', 'desc');
        $page = $request->get('page', 1);
        $cacheKey = 'posts-' . $page . '-' . $order_by . '-' . $order_direction;
        $posts = Cache::remember($cacheKey, 2, function () use ($order_direction, $order_by) {
            return Post::orderBy($order_by, $order_direction)->paginate(10);
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
        $validated['user_id'] = auth()->user()->id;
        Post::create($validated);

        session()->flash('success', 'Data has been stored successfully.');
        return redirect()->route('posts.index')->with('toast', true);
    }
}
