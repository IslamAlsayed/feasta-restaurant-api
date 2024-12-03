<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

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

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function getImageAttribute($value)
    {
        return $value
            ? 'http://127.0.0.1:8000/storage/images/clients/' . $value
            : 'http://127.0.0.1:8000/storage/images/clients/user.jpg';
    }
}
