<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\ProductCategory;

class ShowList extends Component
{
    // search keywords
    public $type = '';
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'type' => ['except' => ''],
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $categories = ProductCategory::select('id')
            ->where('type', (($this->type) ? $this->type : 'plan'))
            ->get();
        $categoryIds = $categories->toArray();
        
        return view('livewire.products.show-list', [
            'products' => Product::where('title', 'like', "%{$this->search}%")
                ->whereIn('product_category_id', $categoryIds)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        ])->layout('layouts.app');
    }
}
