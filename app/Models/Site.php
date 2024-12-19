<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'logo',
        'site_name',
        'email',
        'phone',
        'address',
        'work_hours',
        'about_us',
        'developer'
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getLogoAttribute($value)
    {
        return $value
            ? env('APP_URL') . '/storage/images/logos/' . $value
            : env('APP_URL') . '/storage/images/logos/favicon.png';
    }
}
