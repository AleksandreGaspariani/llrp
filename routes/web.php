<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\PagesController;
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
});


Route::get('/loginUCP',[CharactersController::class,'loginUCP'])->name('loginUCP');
Route::get('/get/character', 'App\Http\Controllers\CharactersController@show');

Route::get('/user',[CharactersController::class, 'test'])->name('test');
Route::get('/logout',[CharactersController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/',[PagesController::class,'index'])->name('index');

