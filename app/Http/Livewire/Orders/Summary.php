<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Summary extends Component
{
    public function render()
    {
        $waitPaymentOrders = Order::with('user')
        ->whereMonth('created_at', Carbon::now()->month)
        ->where('status', 'waitPayment')
        ->orderBy('created_at', 'desc')
        ->get();

        $processingOrders = Order::with('user')
        ->whereMonth('created_at', Carbon::now()->month)
        ->where('status', 'processing')
        ->orWhere('status', 'onTheWay')
        ->orderBy('created_at', 'desc')
        ->get();
        
        $deliveredOrders = Order::with('user')
        ->whereMonth('created_at', Carbon::now()->month)
        ->where('status', 'delivered')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('livewire.orders.summary', [
            'waitPaymentOrders' => $waitPaymentOrders,
            'processingOrders' => $processingOrders,
            'deliveredOrders' => $deliveredOrders,
            'month' => Carbon::now()->monthName
        ]);
    }
}
