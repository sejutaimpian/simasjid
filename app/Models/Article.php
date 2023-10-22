<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'excerpt',
        'image',
        'body'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('title', 'LIKE', "%{$value}%");
    }
}
