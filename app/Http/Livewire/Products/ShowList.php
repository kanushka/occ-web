<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ShowList extends Component
{
    // search keywords
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        return view('livewire.products.show-list', [
            'products' => Product::where('title', 'like', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        ]);
    }
}
