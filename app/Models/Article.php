<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'writer',
    ];

    protected $hidden = [
        "created_at",
        "deleted_at",
    ];

    public function getImageAttribute($value)
    {
        return $value
            ? env('APP_URL') . '/storage/images/blog/' . $value
            : env('APP_URL') . '/storage/images/blog/2.jpg';
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i A');
    }

    public function articleComments()
    {
        return $this->hasMany(ArticleComments::class);
    }

    public function articleLikes()
    {
        return $this->hasMany(ArticleLikes::class);
    }
}
