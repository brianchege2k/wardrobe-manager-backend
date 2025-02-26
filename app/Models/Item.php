<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'size', 'color', 'brand', 
        'price', 'quantity', 'image', 'user_id'
    ];

    // Relationship: Each item belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ Automatically return full image URL in API response
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null; // If no image, return null
        }

        // Check if it's already a full URL (useful for external image links)
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        // Convert stored path to a full URL
        return asset('storage/' . $value);
    }
}
