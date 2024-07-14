<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['food_ordering_id', 'amount', 'status'];

    public function foodOrdering()
    {
        return $this->belongsTo(FoodOrdering::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
