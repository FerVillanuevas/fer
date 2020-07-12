<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $videos = App\Models\Video::with('tags')->get();
    $posts = App\Models\Post::with('tags')->get();
    $tags = App\Models\Tag::with('posts')->with('videos')->get();
    return [
        'videos' => $videos,
        'posts' => $posts,
        'tags' => $tags,
    ];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
