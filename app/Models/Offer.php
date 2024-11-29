<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount',
        'description',
        'start_date',
        'end_date',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}