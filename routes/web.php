<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('/posts');});

//Routegroup
Route::group(['prefix'=> 'Posts.', 'as' => 'posts.'], function(){

    Route::post('/store', [PostController::class, 'store']) ->name('store');

    Route::get('/view', [PostController::class, 'index']) ->name('index');

    Route::get('edit{post}', [PostController::class, 'edit']) ->name('edit');

    Route::put('update{post}', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete{post}', [PostController::class, 'destroy']) ->name('destroy');

});