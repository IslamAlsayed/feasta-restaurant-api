<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'rating',
        'cookingTime',
        'quantity',
        'cooking',
        'mealType',
        'vat',
        'item_code',
        'offer_price',
        'offer_end_at',
        'discount',
        'description',
        'image',
        'chef_id',
    ];

    public function getImageAttribute($value)
    {
        return $value
            ? 'http://127.0.0.1:8000/storage/images/recipes/' . $value
            : 'http://127.0.0.1:8000/storage/images/recipes/default.png';
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function menuComment()
    {
        return $this->hasMany(MenuComments::class);
    }

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
}
