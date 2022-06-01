<?php

use App\Http\Controllers\ContactController;
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

Route::get('/contacts', [ContactController::class, 'index'])->middleware('auth')->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->middleware('auth')->name('contacts.store');
Route::get('/contacts/create', [ContactController::class, 'create'])->middleware('auth')->name('contacts.create');

Route::get('/contacts/{id}', [ContactController::class, 'show'])->middleware('auth')->name('contacts.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->middleware('auth')->name('contacts.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->middleware('auth')->name('contacts.update');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->middleware('auth')->name('contacts.destroy');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
