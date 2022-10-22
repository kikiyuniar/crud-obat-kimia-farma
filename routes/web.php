<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrugController;
use Illuminate\Support\Facades\Route;

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
    return view('content.dashboard');
});

Route::get('drugs',[DrugController::class,'listDrugs'])->name('drugs');
Route::get('add-drugs',[DrugController::class,'formaddDrugs'])->name('add.drugs');
Route::post('action-drugs',[DrugController::class,'addDrugs'])->name('action.drugs');
Route::get('login',[AuthController::class,'viewLogin'])->name('view.login');
Route::post('action-login',[AuthController::class,'actionLogin'])->name('action.login');
Route::get('register',[AuthController::class,'viewRegister'])->name('view.register');
Route::post('action-register',[AuthController::class,'actionRegister'])->name('action.register');
