<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pdfai extends Model
{
    protected $fillable =['slug', 'original_name', 'file_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
