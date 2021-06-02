<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Products\Show as ShowProduct;
use App\Http\Livewire\Products\Create as CreateProduct;
use App\Http\Livewire\Products\Edit as EditProduct;
use App\Http\Livewire\ShowCart;
use App\Http\Livewire\Orders\ShowList as ShowOrders;

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

Route::get('/products/create', CreateProduct::class)
    ->middleware(['auth', 'can:create,App\Models\Product'])
    ->name('product.create');

Route::get('/products/{product}/edit', EditProduct::class)
->middleware(['auth', 'can:create,App\Models\Product'])
    ->name('product.edit');

Route::get('/products/bag', ShowCart::class)
    ->middleware('auth')
    ->name('cart.show');

Route::get('/orders', ShowOrders::class)
    ->middleware('auth')
    ->name('orders');

require __DIR__.'/auth.php';
