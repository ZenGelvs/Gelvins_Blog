<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('/posts');});


//Resource Controller
Route::resource('posts', PostController::class);

//Routegroup
Route::group(['prefix'=> 'Posts.', 'as' => 'POSTS.'], function(){

    Route::post('/create-post', [PostController::class, 'store']) ->name('store');

    Route::post('/view-post', [PostController::class, 'index']) ->name('index');

    Route::get('/return', [PostController::class, 'return']) ->name('return');

    Route::get('edit-post/{posts}', [PostController::class, 'edit']) ->name('edit');

    Route::put('edit-post/{posts}', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete-post/{posts}', [PostController::class, 'destroy']) ->name('destroy');

});







