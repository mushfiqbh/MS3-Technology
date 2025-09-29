<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'logo', 'note'];

    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'client_solution');
    }
}
