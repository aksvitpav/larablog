<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Category $category, Post $post, User $user)
    {
        $categories_count = $category->all()->count();
        $posts_count = $post->all()->count();
        $user_posts_count = $post->where('user_id', auth()->user()->id)->count();
        $users_count = $user->all()->count();
        return view('home', compact('posts_count', 'user_posts_count', 'categories_count', 'users_count'));
    }
}
