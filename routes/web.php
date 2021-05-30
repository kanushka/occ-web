<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Products\Show as ShowProduct;

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

Route::get('/products', function () {
    return view('products');
})->middleware(['auth'])->name('products');

Route::get('/products/{product}', ShowProduct::class)->middleware(['auth'])->name('product');

require __DIR__.'/auth.php';
