<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('posts', function () {
    return Post::all();
});

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('contact', 'PagesController@contact')->name('pages.contact');
Route::get('archive', 'PagesController@archive')->name('pages.archive');

Route::get('blog/{id}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

//paginas de administracion
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {

        Route::get('/', 'AdminController@index')->name('dashboard');

       // Route::get('users', 'UserController@index')->name('user.index');
      //  Route::get('users/{user}', 'UserController@show')->name('user.show');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
        Route::post('posts', 'PostsController@save')->name('admin.posts.save');
        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');

        Route::resource('users', 'UserController', ['as' => 'admin']);
        Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
        /*Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
        Route::post('posts', 'PostsController@store')->name('admin.posts.store');
        Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::put('post/{post}', 'PostsController@destroy')->name('admin.posts.destroy');*/
        Route::put('users/{user}/roles', 'UserRolesController@update')->name('admin.users.roles.update');
        Route::put('users/{user}/permissions', 'UserPermissionsController@update')->name('admin.users.permissions.update');
    }
);



/*ruta hacia el panel de administracion
Route::get('/home', function () {
return view('admin.dashboard');
})->middleware('auth');*/

Auth::routes();
//Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
