<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class Show extends Component
{
    public Product $product;
    public $defaultImage;
    public $secondImage;
    public $thirdImage;

    public function mount(Product $product)
    {
        $this->product = $product;
        // get public image urls
        $this->defaultImage = count($product->images)>0 ? Storage::url($product->images[0]->url): "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0BIERmNWpySk3SSyc_Zk5MizYrAQpV38sliNkPCO7m-glxdGBfSrmE6wka7Q44l7moC0&usqp=CAU";
        $this->secondImage = count($product->images)>1 ? Storage::url($product->images[1]->url): null;
        $this->thirdImage = count($product->images)>2 ? Storage::url($product->images[2]->url): null;
    }

    public function editProduct()
    {
        return redirect()->route('product.create', $this->product);
    }

    public function render()
    {
        return view('livewire.products.show')
            ->layout('layouts.app');
    }
}
