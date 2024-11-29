<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;

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
            'http://127.0.0.1:8000/storage/images/recipes/' . $value :
            'http://127.0.0.1:8000/storage/images/recipes/default.jpg';
    }

    public function getImageAttribute($value)
    {
        return $value ?
            'http://127.0.0.1:8000/storage/images/chefs/chef' . $value :
            'http://127.0.0.1:8000/storage/images/chefs/user.jpg';
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
