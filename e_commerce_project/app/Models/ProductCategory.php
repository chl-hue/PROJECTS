<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    // I-define ang table name, dahil ginamit natin ay 'product_categories'
    protected $table = 'product_categories';

    // Para makapag-mass assignment tayo sa Controller
    protected $fillable = [
        'name',
        'description',
    ];

    // Relationship: Ang isang Category ay may maraming Products
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}