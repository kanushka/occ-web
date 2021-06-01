<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Product;
use App\Models\ProductCategory;

class Create extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public Product $product;
    public $photos = [];

    protected $rules = [
        'product.title' => 'required|string|min:6',
        'product.description' => 'required|string|max:1000',
        'product.price' => 'required|numeric',
        'product.product_category_id' => 'required|exists:product_categories,id',
        'photos.*' => 'image|max:10240',
    ];

    public function mount()
    {
        $this->product = new Product;
    }

    public function save()
    {
        $this->authorize('create', Product::class);

        $this->validate();

        // save product
        $this->product->save();

        // store images
        foreach ($this->photos as $photo) {
            $path = $photo->store('photos', 'public');
            $this->product->images()->create([
                'url' => $path,
            ]);
        }

        $this->emit('productAdded', $this->product->id);

        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.products.create', [
            'categories' => ProductCategory::all()
        ])->layout('layouts.app');
    }
}
