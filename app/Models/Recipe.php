<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

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

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getPriceWithVatAttribute()
    {
        return $this->price + ($this->price * $this->vat / 100);
    }

    public function getImageAttribute($value)
    {
        return $value
            ? env('APP_URL') . '/storage/images/recipes/' . $value
            : env('APP_URL') . '/storage/images/recipes/default.png';
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function recipeComment()
    {
        return $this->hasMany(RecipeComments::class);
    }

    public function recipeLikes()
    {
        return $this->hasMany(RecipeLikes::class);
    }

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
}
