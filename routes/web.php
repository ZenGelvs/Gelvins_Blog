<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function (){


    


//Resource Controller
Route::resource('posts', PostController::class);

Route::controller(PostController::class)->group(function(){

        Route::get('/', function () {
        return view('/addposts');});

        Route::name('Posts.')->group(function () {

        //Redirect to createpost view and Create an actual Post 
        Route::post('/create-post','createpost') ->name('createpost');

        //Redirect to view posts 
        Route::post('/view-post','index') ->name('viewpost');

        //From Index return to create post 
        Route::get('/createpost-from-viewpost','return') ->name('return');

        //Editpost view from viewpost view
        Route::get('edit-post/{posts}','editPostScreen') ->name('editPostScreen');

        //Actually Edit Post
        Route::put('edit-post/{posts}','editPostReal') ->name('editPostReal');

        //Delete Post
        Route::delete('/delete-post/{posts}','deletePost') ->name('deletePost');

        });
    });

});




//Redirect to createpost view and Create an actual Post
//Route::post('/create-post',[PostController::class, 'createpost']);

//Redirect to view posts
//Route::post('/view-post', [PostController::Class, 'index']);

//From Index return to create post
//Route::get('/createpost-from-viewpost', [PostController::Class, 'return']);

//Editpost view from viewpost view
//Route::get('/edit-post/{posts}', [PostController::Class, 'editPostScreen']);

//Actually Edit Post
//Route::put('/edit-post/{posts}', [PostController::Class, 'editPostReal']);

//Delete Post
//Route::delete('/delete-post/{posts}', [PostController::Class, 'deletePost']);
