<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //validando el campo recibido
        $this->validate($request, ['title' => 'required']);
        //crea la nueva publicacion en la BD unicamente con el titulo y id de usuario
        $post = new Post;
        $post->title = $request->get('title');
        $post->user_id = auth()->user()->id;
        $post->category_id = 1;
        $post->save();
        //retorna la vista de edicion de publicacacion
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->all());
        $post->tags()->sync($request->get('tags'));
        return back()->with('flash', 'Tu publicación ha sido guardada exitosamente');
    }

    public function disable(Post $post)
    {
        $post->update([
            'visible'=> false
        ]);
        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido deshabilitada.');
    }



}
