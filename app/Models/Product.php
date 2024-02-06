<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'year_of_production',
        'year_of_expiration',
        'brand_id',
        'category_id',
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

  
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
