<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;

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
            $posts = $post->where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate(10);
        }
        else {
            $posts = $post->orderByDesc('created_at')->paginate(10);
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {   
        $categories = $category->all(); 
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request, Post $post)
    {
        /*$request->validate([
        ]);*/
        $request->validated();
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = Str::of(Storage::putFile('public',$image))->basename(); //$imageName = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension(); //$image -> move(public_path('storage'), $imageName);
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
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $category)
    {
        $categories = $category->all();
        return view('posts.edit',compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        $request->validated();
        if ($request->hasFile('post_image')) {
            if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $image = $request->file('post_image');
            $imageName = Str::of(Storage::putFile('public',$image))->basename(); //$imageName = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension(); //$image -> move(public_path('storage'), $imageName);
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
        if (Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')
                        ->with('status','Пост успешно удален');
    }
}