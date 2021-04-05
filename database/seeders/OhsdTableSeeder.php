<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Informes;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class OhsdTableSeeder extends Seeder
{
    /**
     * Datos dprecargados.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts'); // Borra el directorio de imagenes.
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Informes::truncate();
        Post::truncate();
        User::truncate();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();


        //Usuario
       $user= new User();
       $user->name='Administrador';
       $user->email='admin@admin.com';
       $user->password='$2y$10$YLYeRCOfm5AWPS3TEkRBZeubh9ibUMO6n9HI3/aHu0tPr5M.IXAyC';
       $user->photo='defaultUser.png';
       $user->save();

       //Categoria 1
        $category=new Category();
        $category->name='Precursores Quimicos';
        $category->save();
        //Categoria 2
        $category=new Category();
        $category->name='oferta';
        $category->save();
        //Categoria 3
        $category=new Category();
        $category->name='Demanda';
        $category->save();

        //posts 1
        $post= new Post();
        $post->title='hallazgo de precursores, sembradíos y cargamentos de droga';
        $post->excerpt=' En las últimas 60 horas las fuerzas del orden han reportado el decomiso de cocaína, cultivos de coca y marihuana, precursores químicos y la captura de extranjeros y hondureños vinculados al narcotráfico.';
        $post->body='En las últimas 60 horas las fuerzas del orden han reportado el decomiso de cocaína, cultivos de coca y marihuana, precursores químicos y la captura de extranjeros y hondureños vinculados al narcotráfico.';
        $post->published_at= Carbon::now()->subDays(2);
        $post->photo='publicacion.png';
        $post->user_id=1;
        $post->category_id=1;
        $post->save();

        $post->tags()->attach(Tag::create(['name'=>'Cocaina']));
        $post->tags()->attach(Tag::create(['name'=>'Laboratorio']));

        $post= new Post();
        $post->title='Capturado con más de 500 plantas de marihuana y queda libre por falta pruebas';
        $post->excerpt='Las autoridades policiales se desplazaron a las comunidades de Los Chorros, Aldea La Trinidad, municipio de Yoro, departamento de Yoro';
        $post->body='Las autoridades policiales se desplazaron a las comunidades de Los Chorros, Aldea La Trinidad, municipio de Yoro, departamento de Yoro';
        $post->published_at= Carbon::now();
        $post->photo='publicacion.png';
        $post->user_id=1;
        $post->category_id=2;
        $post->save();

        $post->tags()->attach(Tag::create(['name'=>'Marihuana']));


    }
}
