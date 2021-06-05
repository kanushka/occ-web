<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Products\ShowList as ShowAllProduct;
use App\Http\Livewire\Products\Show as ShowProduct;
use App\Http\Livewire\Products\Create as CreateProduct;
use App\Http\Livewire\Products\Edit as EditProduct;
use App\Http\Livewire\ShowCart;
use App\Http\Livewire\Orders\ShowList as ShowOrders;
use App\Http\Livewire\Orders\Checkout as CheckoutOrder;
use App\Http\Livewire\Orders\Callback as PaymentCallback;
use App\Http\Controllers\PaymentNotifyController;

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

Route::redirect('/', '/products');

Route::get('/products', ShowAllProduct::class)->name('products');
Route::get('/product', ShowAllProduct::class)->name('hardware');

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

Route::get('/orders/{order}/checkout', CheckoutOrder::class)
    ->middleware('auth')
    ->name('orders.checkout');

Route::get('/orders/{order}/checkout/notify', PaymentNotifyController::class)
    ->name('orders.notify');

require __DIR__.'/auth.php';
