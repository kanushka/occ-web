<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $show;
    public $title;
    public $message;
    public $error;

    protected $listeners = ['cartUpdated'];

    public function mount()
    {
        $this->show = false;
        $this->title = "Success";
        $this->message = "";
        $this->error = false;
    }

    public function cartUpdated()
    {
        $this->show = true;
        $this->title = "";
        $this->message = "Product added to your bag";
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
