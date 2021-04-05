<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    //
    public function show(Tag $tag)
    {
        return view('welcome',
        [
            'title' => "Ultimas noticias de la etiqueta $tag->name",
            'posts' => $tag->posts()->simplePaginate(5)
        ]);
    }
}
