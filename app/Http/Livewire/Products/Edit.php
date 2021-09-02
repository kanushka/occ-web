<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductCategory;

class Edit extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public Product $product;
    public $photos = [];
    public $showDeleteModel = false;

    protected $rules = [
        'product.title' => 'required|string|min:6',
        'product.description' => 'required|string|max:1000',
        'product.price' => 'required|numeric',
        'product.product_category_id' => 'required|exists:product_categories,id',
        'photos.*' => 'image|max:10240',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function update()
    {
        $this->authorize('update', $this->product);

        $this->validate();

        // save product
        $this->product->save();

        // store images
        foreach ($this->photos as $photo) {
            $path = $photo->storePublicly('products', 's3');
            $this->product->images()->create([
                'url' =>  Storage::disk('s3')->url($path),
            ]);
        }

        $this->emit('productUpdated', $this->product->id);

        return redirect()->route('products');
    }

    public function delete()
    {
        $this->authorize('forceDelete', $this->product);
        $tempProduct = $this->product;

        // delete product
        $this->product->images()->forceDelete();
        $this->product->forceDelete();

        $this->emit('productDeleted', $tempProduct->id);

        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.products.edit', [
            'categories' => ProductCategory::all()
        ])->layout('layouts.app');
    }
}
