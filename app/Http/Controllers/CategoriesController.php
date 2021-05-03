<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->simplePaginate(5);
        if(!$posts->isEmpty()){
            $title = "Ultimas noticias de la categoria ".$category->name;
        }else{
            $title = "Upps , No hay publicaciones para la categoria ".$category->name;
        }
        return view('welcome',compact('title','posts'));
    }
}
