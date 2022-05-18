<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'cost',
        'category',
        'number',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category', 'id');
    }
}
