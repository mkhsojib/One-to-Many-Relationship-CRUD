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


//  One to Many Relationship CRUD

Route::get('/create', function () {

    $user = User::findOrFail(1);

//    $post = new Post(['title' => 'this is post title', 'body' => 'this is post content']);

    $user->posts()->save(new Post(['title' => 'this is post title', 'body' => 'this is post content']));

});


Route::get('/read', function (){

  $user =  User::findOrFail(1);

   foreach ($user->posts as $post){

    echo $post->title . '<br>';
   }

});


Route::get('/update', function (){

   $user = User::find(1);

    $user->posts()->where('id', '=', 2)->update(['title'=>'laravel is nice', 'body'=>'laravel 5.4 will update']);

});