<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'image',
        'notes'
    ];

    protected $hidden = [
        'email',
        'password',
        'phone',
        'address',
        'status',
        'notes',
        "deleted_at",
        "created_at"
    ];

    public function getImageAttribute($value)
    {
        return $value
            ? env('APP_URL') . '/storage/images/clients/' . $value
            : env('APP_URL') . '/storage/images/clients/user.jpg';
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function articleComments()
    {
        return $this->hasMany(ArticleComments::class);
    }

    public function articleLikes()
    {
        return $this->hasMany(ArticleLikes::class);
    }

    public function recipeComments()
    {
        return $this->hasMany(RecipeComments::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
