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
        if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Reader')) {
            $posts = Post::all(); //obtiene todos los posts
        } else {
            //$posts = Post::where('user_id',auth()->id())->get(); //obtiene unicamente los posts del usuario autenticado .
            $posts = auth()->user()->posts->where('visible',1); //obtiene unicamente los posts del usuario autenticado.
        }
        return view('admin.posts.index', compact('posts'));
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
        ActionWasCreated::dispatch('post_creado', 'El usuario' . auth()->user()->name . ' creo el post ' . $post->title, auth()->user()->id);
        //retorna la vista de edicion de publicacacion
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        // $this->authorize('update', $post);
        $this->authorize('view', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        $post->tags()->sync($request->get('tags'));
        ActionWasCreated::dispatch('post_modificado', 'El usuario' . auth()->user()->name . ' modifico el post ' . $post->title, auth()->user()->id);
        return back()->with('flash', 'Tu publicación ha sido guardada exitosamente');
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);
        $post->update([
            'visible' => false
        ]);
        ActionWasCreated::dispatch('post_eliminado', 'El usuario' . auth()->user()->name . ' elimino el post ' . $post->title, auth()->user()->id);
        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido eliminada.');
    }

    public function disable(Post $post)
    {
        $this->authorize('delete', $post);
        $post->visible = false;
        $post->update();
        ActionWasCreated::dispatch('post_eliminado', 'El usuario' . auth()->user()->name . ' elimino el post ' . $post->title, auth()->user()->id);
        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido eliminada.');
    }
}
