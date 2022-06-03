<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public function allReviews() {
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }
}
