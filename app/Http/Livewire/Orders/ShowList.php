<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShowList extends Component
{

    public $showModel = false;

    public function render()
    {
        return view('livewire.orders.show-list', [
            'carts' => Cart::with('product', 'order')
                ->where('user_id', Auth::id())
                ->whereNotNull('order_id')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ])->layout('layouts.app');
    }
}
