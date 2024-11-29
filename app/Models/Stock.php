<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'type',
        'title',
        'amount',
        'selling_price',
        'vat',
        'cookTime',
        'difficulty',
        'cooking',
        'calories',
        'mealType',
        'image',
        'description',
    ];

    protected $hidden = [
        'start_date',
        'end_date',
        'ingredients',
        'buying_price',
        'deleted_at',
        'updated_at',
    ];
}
