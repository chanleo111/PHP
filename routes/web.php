<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormController;
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
    return view('home');
});



Route::get('/home', function () { 
    return view('home');
});

//Route::get('add-blog-post-form',[\App\Http\Controllers\PostController::class, 'index']);
//Route::get('/store-form',[\App\Http\Controllers\PostController::class,'store']);

Route::get('store-form',[PostController::class, 'index']);
Route::post('store-form',[PostController::class,'store']);

Route::get('user/create',[FormController::class,'create']);
Route::post('user/create',[FormController::class,'store']);