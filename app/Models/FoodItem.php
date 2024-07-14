<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'availability'];

    /**
     * Define the mutator for setting the image attribute.
     */
    public function setImageAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            // Ensure the image is uploaded and store its path or other details as needed
            $this->attributes['image'] = $value->store('images', 'public');
        } else {
            // If $value is not an instance of UploadedFile, just store it as is
            $this->attributes['image'] = $value;
        }
    }

    public function foodOrderings()
    {
        return $this->hasMany(FoodOrdering::class);
    }
}
