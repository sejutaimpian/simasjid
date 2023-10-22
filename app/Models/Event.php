<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event_name', 'time', 'location', 'participant'];

    public function scopeSearch($query, $value)
    {
        $query->where('event_name', 'LIKE', "%{$value}%");
    }
}
