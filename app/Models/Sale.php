<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    protected $fillable = ['product_id', 'email', 'price', 'stripe_id', 'paid_at'];
    use HasFactory;


    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
