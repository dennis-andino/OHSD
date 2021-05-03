<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{
    public function home()
    {
       

        $query = Post::published();

        if (request('month')) {
            $query->whereMonth('published_at', request('month'));
        }
        if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }
        //$posts = Post::published()->get(); trae todos los registros sin paginar
        //$posts = Post::published()->paginate(5); //Trae los resultados paginados por numero de pagina


        $posts = $query->simplePaginate(10); //Trae los resultados paginados por anterior-siguiente
        return view('welcome', compact('posts'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function reports()
    {
        $reports = Report::all();
        return view('pages.reports', compact('reports'));
    }
}
