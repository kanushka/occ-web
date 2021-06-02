<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Order extends Model
{
    use HasFactory;

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
