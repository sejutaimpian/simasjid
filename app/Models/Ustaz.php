<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustaz extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'link'];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'LIKE', "%{$value}%");
    }
}
