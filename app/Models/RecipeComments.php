<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RecipeComments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'comment',
        'rate',
        'client_id',
        'recipe_id'
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}