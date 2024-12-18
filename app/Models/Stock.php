<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

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

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }
}
