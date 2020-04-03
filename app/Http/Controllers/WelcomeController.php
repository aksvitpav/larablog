<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class WelcomeController extends Controller
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
     * Show blog.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Category $category, Post $post)
    {
        $categories = $category->all();
        $posts = $post->paginate(5);
        return view('welcome', compact('posts','categories'));
    }

    public function category(Request $request, $category_id, Category $category, Post $post)
    {
        $categories = $category->all();
        $posts = $post->where('category_id', $category_id)->paginate(5);
        return view('welcome', compact('posts','categories'));
    }

    public function user(Request $request, $user_id, Category $category, Post $post)
    {
        $categories = $category->all();
        $posts = $post->where('user_id', $user_id)->paginate(5);
        return view('welcome', compact('posts','categories'));
    }

    public function post(Request $request, $post_id, Category $category, Post $post)
    {
        $categories = $category->all();
        $current_post = $post->where('id', $post_id)->get();
        return view('posts.post', compact('current_post','categories'));
    }
}