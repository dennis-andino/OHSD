<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Informes;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        Role::truncate();
        Permission::truncate();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();


        //Roles
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);
        $readerRole = Role::create(['name' => 'Reader']);

        //Permisos
        $viewPermissionPost = Permission::create(['name' => 'read_post']);
        $viewPermissionPost = Permission::create(['name' => 'read_global_post']);
        $createPermissionPost = Permission::create(['name' => 'create_post']);
        $editPermissionPost = Permission::create(['name' => 'edit_post']);
        $deletePermissionPost = Permission::create(['name' => 'delete_post']);
        $viewPermissionUser = Permission::create(['name' => 'read_user']);
        $createPermissionUser = Permission::create(['name' => 'create_user']);
        $editPermissionUser = Permission::create(['name' => 'edit_user']);
        $deletePermissionUser = Permission::create(['name' => 'delete_user']);
        $viewPermissionRoles = Permission::create(['name' => 'read_roles']);
        $createPermissionRoles = Permission::create(['name' => 'create_roles']);
        $editPermissionRoles = Permission::create(['name' => 'edit_roles']);
        $deletePermissionRoles = Permission::create(['name' => 'delete_roles']);

        //Permisos heredados por Rol Admin
        $adminRole->givePermissionTo('read_post');
        $adminRole->givePermissionTo('delete_post');
        $adminRole->givePermissionTo('read_user');
        $adminRole->givePermissionTo('create_user');
        $adminRole->givePermissionTo('edit_user');
        $adminRole->givePermissionTo('delete_user');
        $adminRole->givePermissionTo('read_roles');
        $adminRole->givePermissionTo('create_roles');
        $adminRole->givePermissionTo('edit_roles');
        $adminRole->givePermissionTo('delete_roles');

        //Permisos heredados por Rol Writer
        $writerRole->givePermissionTo('read_post');
        $writerRole->givePermissionTo('edit_post');
        $writerRole->givePermissionTo('create_post');

        //Permisos heredados por Rol Reader
        $readerRole->givePermissionTo('read_global_post');



        //Usuario Administrador
        $admin = new User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@ohsd.com';
        $admin->password = 'administr@dor';
        $admin->photo = 'defaultUser.png';
        $admin->save();

        $admin->assignRole($adminRole);

        //Usuario Escritor de contenido
        $writer = new User();
        $writer->name = 'Elsa Gonzales';
        $writer->email = 'elsa@ohsd.com';
        $writer->password = 'administr@dor';
        $writer->photo = 'defaultUser.png';
        $writer->save();

        $writer->assignRole($writerRole);

        //Usuario Visualizador de contenido
        $reader = new User();
        $reader->name = 'Carlos Godoy';
        $reader->email = 'cgodoy@ohsd.com';
        $reader->password = 'administr@dor';
        $reader->photo = 'defaultUser.png';
        $reader->save();

        $reader->assignRole($readerRole);

        //Categoria 1
        $category = new Category();
        $category->name = 'Precursores Quimicos';
        $category->save();
        //Categoria 2
        $category = new Category();
        $category->name = 'oferta';
        $category->save();
        //Categoria 3
        $category = new Category();
        $category->name = 'Demanda';
        $category->save();

        //posts 1
        $post = new Post();
        $post->title = 'hallazgo de precursores, sembradíos y cargamentos de droga';
        $post->excerpt = ' En las últimas 60 horas las fuerzas del orden han reportado el decomiso de cocaína, cultivos de coca y marihuana, precursores químicos y la captura de extranjeros y hondureños vinculados al narcotráfico.';
        $post->body = 'En las últimas 60 horas las fuerzas del orden han reportado el decomiso de cocaína, cultivos de coca y marihuana, precursores químicos y la captura de extranjeros y hondureños vinculados al narcotráfico.';
        $post->published_at = Carbon::now()->subDays(2);
        $post->user_id = 1;
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Cocaina']));
        $post->tags()->attach(Tag::create(['name' => 'Laboratorio']));

        $post = new Post();
        $post->title = 'Capturado con más de 500 plantas de marihuana y queda libre por falta pruebas';
        $post->excerpt = 'Las autoridades policiales se desplazaron a las comunidades de Los Chorros, Aldea La Trinidad, municipio de Yoro, departamento de Yoro';
        $post->body = 'Las autoridades policiales se desplazaron a las comunidades de Los Chorros, Aldea La Trinidad, municipio de Yoro, departamento de Yoro';
        $post->published_at = Carbon::now();
        $post->user_id = 2;
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Marihuana']));
    }
}
