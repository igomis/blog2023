<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('inici');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
Route::get('posts', function () {
    return 'LLISTAT DE POSTS';
})->name('posts_listado');

Route::get('posts/{id}', function ($id) {
    return 'POST '.$id;
})->where('id', '[0-9]+')
    ->name('posts_ficha');

Route::get('posts', function () {
    return view('posts.listado');
})->name('posts_listado');

Route::get('posts/{id}', function ($id) {
    return view('posts.ficha', compact('id'));
})->where('id', '[0-9]+')
    ->name('posts_ficha');
*/

Route::resource('posts',PostController::class)->only(['index','show','create','edit','destroy']);
Route::get('posts/nuevoPrueba', 'PostController@nuevoPrueba')->name('nuevoPrueba');
Route::get('posts/editarPrueba/{id}', 'PostController@editarPrueba')->name('editarPrueba');
