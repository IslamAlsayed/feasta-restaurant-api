<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'items',
        'total',
        'code',
        'client_id',
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = strtoupper(substr(md5(uniqid()), 0, 10));
            }
        });
    }
}
