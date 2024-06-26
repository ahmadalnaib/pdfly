<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'price', 'credits', 'description', 'live'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
