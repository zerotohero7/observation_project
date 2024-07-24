<?php

use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

// routes/web.php
Route::get('/children', [ChildController::class, 'index'])->name('children.list');
Route::post('/children/update', [ChildController::class, 'update'])->name('children.update');





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
