<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dkm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'position', 'description', 'link'];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'LIKE', "%{$value}%");
    }
}
