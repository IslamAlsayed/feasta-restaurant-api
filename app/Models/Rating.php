<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'rate',
        'client_id',
        'menu_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
