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

    Route::post('/create', [PostController::class, 'store']) ->name('store');

    Route::post('/view', [PostController::class, 'index']) ->name('index');

    Route::get('/return', [PostController::class, 'return']) ->name('return');

    Route::get('edit/{posts}', [PostController::class, 'edit']) ->name('edit');

    Route::put('update/{posts}', [PostController::class, 'update']) ->name('update');

    Route::delete('/delete/{posts}', [PostController::class, 'destroy']) ->name('destroy');

});