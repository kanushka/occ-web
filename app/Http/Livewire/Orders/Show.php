<?php

namespace App\Http\Livewire\Orders;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;

class Show extends Component
{
    public Order $order;
    public $cartItems;
    public $user;
    public $tax = 100;

    protected $listeners = ['orderUpdated' => 'mount'];

    public function mount(Order $order)
    {
        $this->user = Auth::user();
        $this->order = $order;
        $this->cartItems = $order->cartItems;
    }

    public function render()
    {
        return view('livewire.orders.show')
            ->layout('layouts.app');
    }
}
