<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class Card extends Component
{

    public Product $product;
    public $defaultImage;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->defaultImage = count($product->images)>0 ? Storage::url($product->images[0]->url): "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0BIERmNWpySk3SSyc_Zk5MizYrAQpV38sliNkPCO7m-glxdGBfSrmE6wka7Q44l7moC0&usqp=CAU";
    }

    public function viewProduct()
    {
        return redirect()->route('product.show', $this->product);
    }

    public function render()
    {
        return view('livewire.products.card');
    }
}
