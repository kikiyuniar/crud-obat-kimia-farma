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

Route::post('action-login',[AuthController::class,'actionLogin'])->name('action.login');
Route::get('register',[AuthController::class,'viewRegister'])->name('view.register');
Route::post('action-register',[AuthController::class,'actionRegister'])->name('action.register');

Route::middleware(['guest'])->group(function () {
    Route::get('login',[authController::class,'viewLogin'])->name('view.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard',[DrugController::class,'dashboard'])->name('dashboard');
    
    Route::get('drugs',[DrugController::class,'listDrugs'])->name('drugs');
    Route::get('add-drugs',[DrugController::class,'formaddDrugs'])->name('add.drugs');
    Route::post('action-drugs',[DrugController::class,'addDrugs'])->name('action.drugs');
    Route::get('edit-drugs/{id}',[DrugController::class,'vieweditDrugs'])->name('edit.drugs');
    Route::get('detail-drugs/{id}',[DrugController::class,'viewDrugs'])->name('detail.drugs');
    Route::post('action-edit-drugs',[DrugController::class,'actioneditDrugs'])->name('action.edit.drugs');
    Route::get('delete-drugs/{id}',[DrugController::class,'destroy'])->name('delete.drugs');
    
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});