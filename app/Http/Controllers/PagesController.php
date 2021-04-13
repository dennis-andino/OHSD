<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{
    public function home()
    {
        //$posts = Post::published()->get(); trae todos los registros sin paginar
        //$posts = Post::published()->paginate(5); //Trae los resultados paginados por numero de pagina
        $categories=Category::all();
        $posts = Post::published()->simplePaginate(5); //Trae los resultados paginados por anterior-siguiente
        return view('welcome', compact('posts','categories'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function archive()
    {
        return view('pages.archive');
    }
}
