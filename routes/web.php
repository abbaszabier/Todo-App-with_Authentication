<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\LoginController;
use App\http\Controllers\RegisterController;
use App\http\Controllers\HomeController;
use App\Http\Controllers\TodosController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/home/{id}/edit', [HomeController::class, 'index'])->middleware('auth');
// Route::post('/home', [HomeController::class, 'destroy'])->middleware('auth');

//  Route::resource('home', 'App\Http\Controllers\TodosController')->middleware('auth');
 Route::get('/home', [TodosController::class, 'index'])->middleware('auth');
 Route::delete('/destroy/{id}', [TodosController::class, 'destroy'])->name('destroy')->middleware('auth');
 Route::post('/home', [TodosController::class, 'store'])->middleware('auth');