<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

//Posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');


Route::controller(PostController::class)->group(function () {


    Route::prefix('posts')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/create', 'create')->name('posts.create');

            Route::get('/manage', 'manage')->name('posts.manage');

            Route::post('/posts', 'store')->name('posts.store');

            Route::get('/{post:slug}/edit', 'edit')->name('posts.edit');

            Route::patch('/update', 'update')->name('posts.update');

            Route::post('/delete', 'destroy')->name('posts.delete');
        });
        // Route::middleware(['guest'])->group(function () {
        Route::get('posts/{post:slug}', 'show')->name('posts.show');
        // });
    });
});

//Users

Route::controller(UserController::class)->group(function () {

    Route::get('/register', 'create')->name('users.create');

    Route::post('/store', 'store')->name('users.store');

    Route::get('/login', 'login')->name('login');

    Route::post('/authenticate', 'authenticate')->name('users.authenticate');

    Route::post('/logout', 'logout')->name('users.logout');
});

// Route::get('/register', [UserController::class, 'create'])->name('users.create');

// Route::post('/store', [UserController::class, 'store'])->name('users.store');

// Route::get('/login', [UserController::class, 'login'])->name('login');

// Route::post('/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');

// Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
