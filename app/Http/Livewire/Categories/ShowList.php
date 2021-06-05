<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\ProductCategory;

class ShowList extends Component
{
    use AuthorizesRequests;
    public ProductCategory $category;
    public $showModel = false;
    public $modelTitle;

    protected $rules = [
        'category.title' => 'required|string|min:6|max:250',
        'category.type' => 'required|string',
    ];

    public function mount()
    {
        $this->category = new ProductCategory;
    }

    public function showEdit(ProductCategory $category)
    {
        $this->authorize('create', ProductCategory::class);

        $this->category = $category;
        $this->modelTitle = "Update category {$category->title}";
        $this->showModel = true;
    }

    public function showNew()
    {
        $this->authorize('create', ProductCategory::class);

        $this->category = new ProductCategory;
        $this->category->type = "plan";
        $this->modelTitle = "Add new category";
        $this->showModel = true;
    }

    public function save()
    {
        $this->authorize('create', Product::class);

        $this->validate();

        $this->category->save();

        $this->emit('categoryUpdated', $this->category->id);

        $this->showModel = false;
    }

    public function render()
    {
        return view('livewire.categories.show-list', [
            'categories' => ProductCategory::orderBy('type', 'asc')
                ->paginate(10)
        ])->layout('layouts.app');
    }
}
