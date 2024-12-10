<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
       return $this->belongsTo(Type::class);
    }

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function episodes()
    {
       return $this->hasMany(Episode::class);
    }

    public function relatedMovies()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id')
                    ->where('id', '!=', $this->id); // Exclude current movie
    }

}
