<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{

    public function store(Post $post)
    {

        $this->validate(request(), [
            'photo' => 'required|image|max:2048'
        ]);

        $post->photos()->create([
            'url' => request()->file('photo')->store('posts', 'public'),
            'post_id' => $post->id
        ]);
    }

    public function destroy(Photo $photo)
    {

        $photo->delete();
        //$photopath=str_replace('storage','public',$photo->url);
        return back()->with('flash', 'Fotografia eliminada !');
    }
}
