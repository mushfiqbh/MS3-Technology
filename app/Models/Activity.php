<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'activity_date',
        'description',
        'status',
        'image_url',
    ];

    public function images()
    {
        return $this->hasMany(ActivityImage::class);
    }
}
