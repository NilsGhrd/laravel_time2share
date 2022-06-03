<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    public function allProducts() {
        return $this->hasMany('\App\Models\Product', 'category', 'category');
    }
}
