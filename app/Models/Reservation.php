<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'capacity',
        'date',
        'time',
        'phone',
        'status',
        'client_id'
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function getTimeAttribute($value)
    {
        $times = [
            '1' => 'breakfast',
            '2' => 'lunch',
            '3' => 'dinner',
        ];

        return $times[$value] ?? $value;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
