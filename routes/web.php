<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Blog\PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/post/{id}', 'PostsController@show');
//Route::resource('rest', 'RestTestController')->names('restTest');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'],function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

//Админка блога

$groupDate =[
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];

Route::group($groupDate ,function() {
    // BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
});

Route::group($groupDate ,function() {
    // BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('post', 'PostController')
        ->only($methods)
        ->names('blog.admin.post');
});


