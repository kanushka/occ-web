<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Order;

class Process extends Component
{
    use AuthorizesRequests;
    
    public Order $order;
    public $payments;

    protected $rules = [
        'order.status' => 'required|string',
    ];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->payments = $order->payments;
    }

    public function save()
    {
        $this->authorize('update', $this->order);

        $this->order->save();

        $this->emit('orderUpdated', $this->order->id);
    }
    
    public function render()
    {
        return view('livewire.orders.process');
    }
}
