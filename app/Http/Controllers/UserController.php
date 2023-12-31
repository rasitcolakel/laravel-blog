<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index',
            [
                'users' => $users
            ]);
    }

    public function show(User $user)
    {
        $posts = $user->posts()->paginate(10);
        return view('users.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
