<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Post;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         DB::statement("SET lc_time_names='es_ES'");
        $archive = Post::selectRaw('year(published_at) as year')
        ->selectRaw('monthname(published_at) as monthname')
        ->selectRaw('month(published_at) as month')
        ->selectRaw('count(*) as posts')
        ->orderBy('published_at')
        ->groupBy('year', 'month', 'monthname')->get();
        view()->share('archive', $archive);
        view()->share('categories', Category::all());

    }
}
