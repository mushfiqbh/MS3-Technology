<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'project_type',
        'budget_type',
        'timeline',
        'preferred_contact_method',
        'project_description',
        'status',
    ];
}
