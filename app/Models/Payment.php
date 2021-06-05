<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    protected $fillable = ['response'];

    protected $casts = [
        'response' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
