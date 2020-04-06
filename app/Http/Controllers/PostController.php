<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $role = auth()->user()->role;
        if ($role == 'author') {
            $posts = $post->where('user_id', auth()->user()->id)->get();
        }
        else {
            $posts = $post->all();
        }
        return view('posts.index', compact('posts', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {   
        $role = auth()->user()->role;
        $categories = $category->all(); 
        return view('posts.create', compact('categories', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required',
            'image' => 'sometimes|image',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $image -> move(public_path('storage'), $imageName);
            $request['image'] = $imageName;
        }
        $post->create($request->all());
        return redirect()->route('posts.index')
                        ->with('status','Пост успешно создан');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {   
        $role = auth()->user()->role;
        return view('posts.show',compact('post', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $category)
    {
        $role = auth()->user()->role;
        $categories = $category->all();
        return view('posts.edit',compact('post', 'categories', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $image -> move(public_path('storage'), $imageName);
            $request['image'] = $imageName;
        }
        $post->update($request->all());
        return redirect()->route('posts.index')
                        ->with('status','Пост успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->route('posts.index')
                        ->with('status','Пост успешно удален');
    }
}