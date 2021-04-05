<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('welcome',
    [
        'title' => "Ultimas noticias de la categoria $category->name",
        'posts' => $category->posts()->simplePaginate(5)
    ]);
    }
}
