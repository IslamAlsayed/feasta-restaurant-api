<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'items',
        'total',
        'order_code',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->order_code)) {
                $model->order_code = strtoupper(substr(md5(uniqid()), 0, 10));
            }

            if (empty($model->total)) {
                $items = json_decode($model->items, true);
                $total = 0;

                foreach ($items as $item) {
                    $total += $item['price'] * $item['quantity'] + ($item['price'] * $item['quantity'] * ($item['vat'] / 100));
                }

                $model->total = number_format($total);
            }
        });
    }
}
