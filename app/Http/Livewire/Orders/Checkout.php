<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class Checkout extends Component
{
    public Order $order;
    public User $user;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->user = $order->user;
    }

    public function render()
    {
        return view('livewire.orders.checkout');
    }
}
