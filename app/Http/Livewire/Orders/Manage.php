<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;

class Manage extends Component
{
    public function render()
    {
        return view('livewire.orders.manage', [
            'orders' => Order::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ])->layout('layouts.app');
    }
}
