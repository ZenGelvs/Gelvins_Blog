<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('/addposts');});


//Resource Controller
Route::resource('posts', PostController::class);

Route::group(['prefix'=> 'POSTS', 'as' => 'POSTS.'], function(){

    Route::post('/create-post', [PostController::class, 'store']) ->name('store');

    Route::post('/view-post', [PostController::class, 'index']) ->name('index');

    Route::get('/createpost-from-viewpost', [PostController::class, 'return']) ->name('return');

    Route::get('edit-post/{posts}', [PostController::class, 'edit']) ->name('edit');

    Route::put('edit-post/{posts}', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete-post/{posts}', [PostController::class, 'destroy']) ->name('destryo');

});


/*Route::controller(PostController::class)->group(function(){

        //Redirect to createpost view and Create an actual Post 
        Route::post('/create-post','store');

        //Redirect to view posts 
        Route::post('/view-post','index');

        //From Index return to create post 
        Route::get('/createpost-from-viewpost','return');

        //Editpost view from viewpost view
        Route::get('edit-post/{posts}','edit');

        //Actually Edit Post
        Route::put('edit-post/{posts}','update');

        //Delete Post
        Route::delete('/delete-post/{posts}','destroy');

       
    }); */




