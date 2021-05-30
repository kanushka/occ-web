<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class Card extends Component
{

    public Product $product;
    public $defaultImage;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->defaultImage = count($product->images)>0 ? $product->images[0]->url: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0BIERmNWpySk3SSyc_Zk5MizYrAQpV38sliNkPCO7m-glxdGBfSrmE6wka7Q44l7moC0&usqp=CAU";
    }

    public function viewProduct()
    {
        return redirect()->route('product', $this->product);
    }

    public function render()
    {
        return view('livewire.products.card');
    }
}
