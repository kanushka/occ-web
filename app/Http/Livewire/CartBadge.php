<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartBadge extends Component
{
    public $count;

    protected $listeners = ['cartUpdated' => 'mount'];

    public function mount()
    {
        $this->count = Auth::user()->cart()
            ->with('product')
            ->whereNull('order_id')
            ->orderBy('created_at', 'desc')
            ->count();
    }

    public function render()
    {
        return <<<'blade'
            <div wire:poll class="px-2 rounded-full bg-black text-white">
            @if($count>0)
                {{$count}}
                @endif
            </div>
        blade;
    }
}
