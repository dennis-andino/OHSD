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
        \DB::statement("SET lc_time_names='es_ES'");
        $query=Post::published();

        if(request('month')){
            $query->whereMonth('published_at', request('month'));
        }
        if(request('year')){
            $query->whereYear('published_at', request('year'));
        }
        //$posts = Post::published()->get(); trae todos los registros sin paginar
        //$posts = Post::published()->paginate(5); //Trae los resultados paginados por numero de pagina
        $categories=Category::all();
        $archive= Post::selectRaw('year(published_at) as year')
        ->selectRaw('monthname(published_at) as monthname')
        ->selectRaw('month(published_at) as month')
        ->selectRaw('count(*) as posts')
        ->orderBy('published_at')
        ->groupBy('year','month','monthname')->get();
       $posts =$query->simplePaginate(5); //Trae los resultados paginados por anterior-siguiente
        return view('welcome', compact('posts','categories','archive'));
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
