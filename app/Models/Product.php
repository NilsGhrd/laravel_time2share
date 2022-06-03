<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function categoryModel(){
        return $this->belongsTo('\App\Models\ProductCategory', 'category', 'category');
    }
}
