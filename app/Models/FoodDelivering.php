<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDelivering extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_ordering_id',
        'delivery_status',
        'delivery_date'
    ];

    public function foodOrdering()
    {
        return $this->belongsTo(FoodOrdering::class);
    }
}
