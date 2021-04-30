<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\ActionWasCreated;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::where('user_id',auth()->id())->get();
        $posts = Post::allowed()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        //validando el campo recibido
        $this->validate($request, ['title' => 'required|min:20|unique:posts']);
        //crea la nueva publicacion en la BD unicamente con el titulo y id de usuario
        $post = new Post;
        $post->title = $request->get('title');
        $post->published_at = Carbon::now();
        $post->user_id = auth()->user()->id;
        $post->category_id = 1;
        $post->save();
        ActionWasCreated::dispatch('post_creado','El usuario'.auth()->user()->name.' creo el post '.$post->title, auth()->user()->id);
        //retorna la vista de edicion de publicacacion
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        $post->tags()->sync($request->get('tags'));
        return back()->with('flash', 'Tu publicación ha sido guardada exitosamente');
    }

    public function destroy(Post $post)
    {
        ActionWasCreated::dispatch('post_eliminado','El usuario'.auth()->user()->name.' elimino el post '.$post->title, auth()->user()->id);
        $this->authorize('delete', $post);
        $post->update([
            'visible' => false
        ]);
        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido deshabilitada.');
    }

    public function disable(Post $post)
    {
        $this->authorize('delete', $post);
        $post->visible=false;
        $post->update();
        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido deshabilitada.');
    }
}
