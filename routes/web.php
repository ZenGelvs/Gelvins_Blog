<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

    Route::get('/', function () {
    return view('/posts');});

    Route::group(['prefix'=> 'posts', 'as' => 'post.'], function(){

        Route::post('/store', [PostController::class, 'store'])->name('store');
    
        Route::get('/view', [PostController::class, 'index'])->name('index');
    
        Route::group(['prefix' => '{post}'], function () {
    
            Route::get('edit', [PostController::class, 'edit'])->name('edit');
    
            Route::put('update', [PostController::class, 'update'])->name('update');
    
            Route::delete('delete', [PostController::class, 'destroy'])->name('destroy');
        });
    });