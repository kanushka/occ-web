<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Cart;

class ShowList extends Component
{

    public $showModel = false;

    public function render()
    {
        return view('livewire.orders.show-list', [
            'carts' => Cart::with('product', 'order')
                ->whereNotNull('order_id')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ])->layout('layouts.app');
    }
}
