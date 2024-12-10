<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'items',
        'total',
        'discount',
        'client',
        'address',
        'wayEat',
        'wayPay',
        'status',
        'client_id',
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
