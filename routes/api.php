<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Resources\PostResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });

    //Routegroup
    Route::group(['prefix'=> 'posts', 'as' => 'post.'], function(){

        Route::post('store', [PostController::class, 'store']);

        Route::get('index', [PostController::class, 'index']);

        Route::group(['prefix' => '{post}'], function () {

            Route::get('show', [PostController::class, 'show']);

            Route::get('edit', [PostController::class, 'edit'])->name('edit');

            Route::put('update', [PostController::class, 'update']);

            Route::delete('delete', [PostController::class, 'destroy']);
         });
    });