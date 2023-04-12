<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SauceController;
use App\Http\Controllers\HomeController;

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
 return view('index');
});

Route::delete('/sauces/{id}', [SauceController::class, 'destroy'])->name('sauces.destroy');
Route::get('/sauces', [SauceController::class, 'index'])->name('sauces');
Route::get('/sauces/{id}', [SauceController::class, 'show'])->name('sauces.show');


Route::post('/sauces', [SauceController::class, 'store'])->name('sauces.store');

Route::get('/addsauces', [SauceController::class, 'add'])->name('sauces.add');

Route::get('/sauces/{id}/edit', [SauceController::class, 'edit'])->name('sauces.edit');
Route::put('/sauces/{id}', [SauceController::class, 'update'])->name('sauces.update');



Route::post('/sauces/{id}/like', [SauceController::class, 'like'])->name('sauces.like');
Route::post('/sauces/{id}/dislike', [SauceController::class, 'dislike'])->name('sauces.dislike');
    


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
