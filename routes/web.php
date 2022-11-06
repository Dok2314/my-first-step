<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog AS BlogControllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin/posts', 'as' => 'posts.'], function (){
    Route::get('/', [BlogControllers\PostsController::class, 'index'])
        ->name('index');

    Route::get('create', [BlogControllers\PostsController::class, 'create'])
        ->name('create');

    Route::post('create', [BlogControllers\PostsController::class, 'store']);

    Route::group(['prefix' => '{post}'], function (){
        Route::get('edit', [BlogControllers\PostsController::class, 'edit'])
            ->name('edit');

        Route::get('/', [BlogControllers\PostsController::class, 'show'])
            ->name('show');

        Route::patch('edit', [BlogControllers\PostsController::class, 'update']);

        Route::delete('/', [BlogControllers\PostsController::class, 'destroy'])
            ->name('delete');

        Route::patch('/restore', [BlogControllers\PostsController::class, 'restore'])
            ->name('restore')->withTrashed();
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'comments', 'as' => 'comments.'], function (){
    Route::group(['prefix' => '{post}'], function () {
        Route::get('/', [BlogControllers\CommentsController::class, 'index'])
            ->name('index');

        Route::get('create', [BlogControllers\CommentsController::class, 'create'])
            ->name('create');

        Route::post('create', [BlogControllers\CommentsController::class, 'store']);
    });
});
