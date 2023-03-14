<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CasinoController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\ApproveDeny;

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

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/register',[AccountController::class, 'ucpRegisterForm'])->name('register_form');
Route::post('/register',[AccountController::class, 'ucpRegister'])->name('register');

//Route::get('/insert',[CharactersController::class, 'insert'])->name('insert');
//Route::get('/get/character', 'App\Http\Controllers\CharactersController@show');



    Route::get('/profile', [CharactersController::class, 'profile'])->name('profile');
    Route::get('/show/{id}', [CharactersController::class, 'show'])->name('showChar');
    Route::get('/logout', [CharactersController::class, 'logout'])->name('logout');
    Route::get('/casino', [CasinoController::class, 'slots'])->name('slots');

//    Admin

        Route::get('/another_view',[PagesController::class,'anotherView'])->name('another_view');

        Route::post('/loginUCP',[AccountController::class,'ucpLogin'])->name('loginUCP');
        Route::get('/ucp/approves',[AccountController::class,'ucpApproveForm'])->name('ucpApprove');
        Route::post('/approve/{id}',[AccountController::class,'approveUCP'])->name('approve_ucp');
        Route::post('/deny/{id}',[AccountController::class,'denyUCP'])->name('deny_ucp');

        Route::get('/characters',[CasinoController::class,'showCharacters'])->name('showCharacters');
        Route::get('/choose_for_casino/{id}',[CasinoController::class,'chooseCharacter'])->name('showCharacter');
        Route::get('/change_char',[CasinoController::class,'changeCharacter'])->name('changeCharacter');
        Route::post('/subCash/{id}',[CasinoController::class,'subCash'])->name('subCash');
        Route::post('/addCash/{id}',[CasinoController::class,'addCash'])->name('addCash');


//Route::get('/loginUCP',[LoginController::class,'showLoginForm'])->name('loginUCPform');
//Route::post('/loginUCP',[LoginController::class,'ucpLogin'])->name('loginUCP');

//Auth::routes();


