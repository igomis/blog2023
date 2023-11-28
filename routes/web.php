<?php

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

/*
Route::get('posts', function () {
    return "Llistat de POSTS";
})->name('posts_listado');

Route::get('posts/{id}', function ($id) {
    return "Fitxa del POST ".$id;
})->where('id', '[0-9]+')
    ->name('posts_ficha');
*/
Route::get('posts', function () {
    return view('posts.listado');
})->name('posts_listado');

Route::get('posts/{id}', function ($id) {
    return view('posts.ficha', compact('id'));
})->where('id', '[0-9]+')
    ->name('posts_ficha');
