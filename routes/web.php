<?php

use App\Http\Controllers\MasterData\MasterUnitKerjaController;
use App\Http\Controllers\User\ProfileController;
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




// ---------------------user------------------
Route::resource('profile', ProfileController::class);

// MASTER DATA
Route::prefix('Masterdata')
    // ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::resource('unit-kerja', MasterUnitKerjaController::class);
    });