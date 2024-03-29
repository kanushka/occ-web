<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Mail\OrderPlaced;

class ShowCart extends Component
{
    public $cartItems;
    public $user;
    public $tax = 100;
    public $totalAmount;
    public $receiver;
    public $showModel = false;
    public $order_id = ''; // payhere callback param

    protected $queryString = [
        'order_id' => ['except' => ''],
    ];

    protected $listeners = ['cartUpdated' => 'mount'];

    protected $rules = [
        'receiver.name' => 'required|string|min:3',
        'receiver.contact' => 'required|string|max:14',
        'receiver.address' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->cartItems = $this->user->cart()
            ->with('product')
            ->whereNull('order_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $this->receiver = [
            'name' => $this->user->name
        ];

        if($this->order_id !== ''){
            $this->showModel = true;
        }
    }

    public function removeItem($cardItemId)
    {
        $deletedRows = Cart::where('id', $cardItemId)->delete();

        $this->emit('orderPlaced');
    }

    public function makeOrder($type="cash")
    {
        $this->validate();

        foreach ($this->cartItems as $item) {
            $this->totalAmount += $item->product->price;
        }

        $order = new Order;
        $order->user_id = $this->user->id;
        $order->contact_name = $this->receiver['name'];
        $order->contact_phone = $this->receiver['contact'];
        $order->contact_address = $this->receiver['address'];
        $order->total = $this->totalAmount;
        $order->payment_type = $type;
        $order->status = ($type === "cash") ? "processing" : "waitPayment";
        
        $order->save();

        foreach ($this->cartItems as $key => $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }

        if($type === "card"){
            // init payhere checkout flow
            return redirect()->route('orders.checkout', $order);
        }

        $this->showModel = true;
        Mail::to($this->user)->send(new OrderPlaced($order, $this->user));
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.show-cart')
            ->layout('layouts.app');
    }
}
