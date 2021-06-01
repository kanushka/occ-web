<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Products\Show as ShowProduct;
use App\Http\Livewire\Products\Create as CreateProduct;
use App\Http\Livewire\Products\Edit as EditProduct;

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
    return view('products');
});

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/products/{product}/details', ShowProduct::class)->name('product.show');
Route::get('/products/create', CreateProduct::class)->name('product.create');
Route::get('/products/{product}/edit', EditProduct::class)->name('product.edit');

require __DIR__.'/auth.php';
