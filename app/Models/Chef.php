<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'age',
        'titleJob',
        'specialty',
        'description',
        'information',
        'about',
        'experience',
        'skills',
        'favorite_dish',
        'favorite_dish_image',
        'years_experience',
        'media',
        'image'
    ];

    public function getFavoriteDishImageAttribute($value)
    {
        return $value ?
            env('APP_URL') . '/storage/images/recipes/' . $value :
            env('APP_URL') . '/storage/images/recipes/default.jpg';
    }

    public function getImageAttribute($value)
    {
        return $value ?
            env('APP_URL') . '/storage/images/chefs/chef' . $value :
            env('APP_URL') . '/storage/images/chefs/user.jpg';
    }

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
