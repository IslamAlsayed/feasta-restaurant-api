<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment',
        'rate',
        'menu_id',
        'client_id'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}