<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'recipe_id',
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
