<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', fn () => 'Halaman produk')->name('products');
Route::get('/about', fn () => 'Halaman about')->name('about');
