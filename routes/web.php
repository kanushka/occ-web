<?php

use App\Http\Controllers\PaymentNotifyController;
use App\Http\Livewire\Categories\ShowList as ShowCategories;
use App\Http\Livewire\Orders\Checkout as CheckoutOrder;
use App\Http\Livewire\Orders\Manage as ManageOrders;
use App\Http\Livewire\Orders\Show as ShowOrder;
use App\Http\Livewire\Orders\ShowList as ShowOrders;
use App\Http\Livewire\Orders\Summary as OrderSummary;
use App\Http\Livewire\Products\Create as CreateProduct;
use App\Http\Livewire\Products\Edit as EditProduct;
use App\Http\Livewire\Products\Show as ShowProduct;
use App\Http\Livewire\Products\ShowList as ShowAllProduct;
use App\Http\Livewire\ShowCart;
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

Route::get('/products/categories', ShowCategories::class)
    ->middleware(['auth', 'can:create,App\Models\ProductCategory'])
    ->name('categories');

Route::get('/orders', ShowOrders::class)
    ->middleware('auth')
    ->name('orders');

Route::get('/manage/orders', ManageOrders::class)
    ->middleware(['auth', 'can:manage,App\Models\Order'])
    ->name('orders.manage');

Route::get('/manage/orders/summary', OrderSummary::class)
    ->middleware(['auth', 'can:manage,App\Models\Order'])
    ->name('orders.summary');

Route::get('/orders/{order}', ShowOrder::class)
    ->middleware('auth')
    ->name('orders.show');

Route::get('/orders/{order}/checkout', CheckoutOrder::class)
    ->middleware('auth')
    ->name('orders.checkout');

Route::get('/orders/{order}/checkout/notify', PaymentNotifyController::class)
    ->name('orders.notify');

require __DIR__ . '/auth.php';
