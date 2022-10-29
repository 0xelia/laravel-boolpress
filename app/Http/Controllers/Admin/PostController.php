<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCreatedPostMail;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $user_id)->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $params = $request->validate([
            'title' => 'required|max:255|min:5',
            'cover' => 'nullable|image|max:4000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'content' => 'required'
        ]);
        

        $baseSlug = Str::slug($params['title']);
        $slug = $baseSlug;
        $post_esistente = Post::where('slug', $baseSlug)->first();
        $counter = 1;

        while($post_esistente){
            
            $slug = $baseSlug . '-' . $counter;
            $post_esistente = Post::where('slug', $slug)->first();
            $counter++;

        }
        $params['slug'] = $slug;
        $params['user_id'] = Auth::id();

        if(array_key_exists('cover', $params)){
            $cover_path = Storage::put('uploads',  $params['cover']);
            $params['cover'] = $cover_path;
        }

        $newPost = Post::create($params);


        if(array_key_exists('tags', $params)){
            $newPost->tags()->sync($params['tags']);
            
        }

        Mail::to($request->user())->send(new SendCreatedPostMail($newPost));

        return redirect()->route('admin.posts.show', $newPost);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id != Auth::id())
            abort(403, "Non hai i permessi per modificare questo post");

        $categories = Category::all();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $params = $request->validate([
            'title' => 'required|max:255|min:5',
            'cover' => 'nullable|image|max:4000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'content' => 'required'
        ]);

        

        if(array_key_exists('cover', $params)){
            Storage::delete($post->cover);
            $cover_path = Storage::put('uploads', $params['cover']);
            $params['cover'] = $cover_path;

        } else {
            $params['cover'] = $post->cover;
        }

        $params['slug'] = Str::slug( $params['title']);

        $post->update($params);

        if(array_key_exists('tags', $params)){
            $post->tags()->sync($params['tags']);
        }   else{
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $cover = $post->cover;
        $post->delete();

        if($cover && Storage::exists($cover)){
            Storage::delete($cover);
        }

        return redirect()->route('admin.posts.index');
    }
}
