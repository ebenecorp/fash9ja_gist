<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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



Route::prefix('categories')->middleware(['auth'])->group(function () {

    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('new', [CategoryController::class, 'create'])->name('category.create');
    Route::post('create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

});





require __DIR__.'/auth.php';
