<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number_of_people',
        'date',
        'time',
        'phone',
        'status',
        'client_id'
    ];

    public function getTimeAttribute($value)
    {
        $times = [
            '1' => 'breakfast',
            '2' => 'lunch',
            '3' => 'dinner',
            '4' => 'dessert',
        ];

        return $times[$value] ?? $value;
    }
}
