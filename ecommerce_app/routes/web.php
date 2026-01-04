<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductList;
use App\Livewire\ShoppingCart;

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

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', ProductList::class)->name('dashboard');
    Route::get('/cart', ShoppingCart::class)->name('cart');
});

require __DIR__.'/auth.php';
