<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/addpost');
});

//Redirect to createpost view and Create an actual Post
Route::post('/create-post',[PostController::class, 'createpost']);

//Redirect to view posts
Route::post('/view-post', [PostController::Class, 'index']);

//From Index return to create post
Route::get('/createpost-from-viewpost', [PostController::Class, 'return']);

