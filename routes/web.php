<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/posts');});

//Routegroup
Route::group(['prefix'=> 'posts', 'as' => 'post.'], function(){

    Route::post('/store', [PostController::class, 'store']) ->name('store');

    Route::get('/view', [PostController::class, 'index']) ->name('index');

    Route::get('edit{post}', [PostController::class, 'edit']) ->name('edit');

    Route::put('update{post}', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete{post}', [PostController::class, 'destroy']) ->name('destroy');
});
