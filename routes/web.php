<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::resource('posts', [PostController::class]);


Route::middleware('auth')->group(function () {

    Route::prefix('categories')->group(function(){

        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('new', [CategoryController::class, 'create'])->name('category.create');
        Route::post('create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    });

    
        Route::resource('posts', PostController::class);
        Route::resource('tags', TagController::class);
        Route::get('posts-trashed', [PostController::class, 'showTrashed'])->name('posts.trashed');
        Route::put('posts-restore/{post}', [PostController::class, 'restore'])->name('posts.restore');

    Route::middleware(['admin'])->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('user.index');
        Route::post('users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('user.make-admin');
        Route::get('users/edit', [UserController::class, 'edit'])->name('user.edit-profile');
        Route::put('users/update', [UserController::class, 'update'])->name('user.update-profile');
        Route::get('company/edit', [ CompanyController::class, 'edit'])->name('edit-company');
        Route::put('company/update', [ CompanyController::class, 'update'])->name('update-company');


    });

});






require __DIR__.'/auth.php';
