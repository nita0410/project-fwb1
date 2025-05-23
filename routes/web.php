<?php

use App\Http\Controllers\RegisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Dashboard::class, 'tampil_regis'])->name('home');

Route::get('/regis',[Dashboard::class, 'tampil_regis'])->name('regis');
Route::post('/regis',[Dashboard::class, 'kirim_data'])->name('kirim');