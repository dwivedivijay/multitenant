<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'verified', 'user']], function() {

});

Route::group(['prefix' => 'company', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.list');
    Route::get('/add', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/update/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.update');
});

Route::group(['prefix' => 'companyuser', 'middleware' => ['auth', 'company']], function() {
    Route::get('/', [App\Http\Controllers\CompanyUserController::class, 'index'])->name('companyuser.list');
    Route::get('/add', [App\Http\Controllers\CompanyUserController::class, 'create'])->name('companyuser.create');
    Route::post('/store', [App\Http\Controllers\CompanyUserController::class, 'store'])->name('companyuser.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('companyuser.edit');
    Route::post('/update/{id}', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('companyuser.update');
});