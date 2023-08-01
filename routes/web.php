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
    return view('/posts');});


//Routegroup
Route::group(['prefix'=> 'posts.', 'as' => 'posts.'], function(){

    Route::post('store/', [PostController::class, 'store']) ->name('store');

    Route::get('view/', [PostController::class, 'index']) ->name('index');

    Route::get('/create', [PostController::class, 'create']) ->name('create');

    Route::get('edit/{posts}', [PostController::class, 'edit']) ->name('edit');

    Route::put('update', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete/{posts}', [PostController::class, 'destroy']) ->name('destroy');

});