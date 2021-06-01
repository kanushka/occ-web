<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class ShowCart extends Component
{
    public $cartItems;
    public $user;
    public $tax;
    public $total;

    public function mount()
    {
        $this->user = Auth::user();
        $this->cartItems = $this->user->cart()
            ->with('product')
            ->whereNull('order_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $this->tax = 100;
        $this->total = 100;
    }

    public function removeItem($cardItemId)
    {
        $deletedRows = Cart::where('id', $cardItemId)->delete();

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.show-cart')
            ->layout('layouts.app');
    }
}
