<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;

class Process extends Component
{
    public Order $order;
    public $payments;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->payments = $order->payments;
    }
    
    public function render()
    {
        return view('livewire.orders.process');
    }
}
