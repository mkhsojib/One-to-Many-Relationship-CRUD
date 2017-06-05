<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function () {

    $user = User::findOrFail(1);

//    $post = new Post(['title' => 'this is post title', 'body' => 'this is post content']);

    $user->posts()->save(new Post(['title' => 'this is post title', 'body' => 'this is post content']));

});