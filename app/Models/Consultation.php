<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'email',
        'phone',
        'company',
        'service_type',
        'budget_range',
        'timeline',
        'description',
        'status',
        'consultation_date',
        'submitted_at',
        // Legacy fields for backward compatibility
        'name',
        'project_type',
        'budget_type',
        'preferred_contact_method',
        'project_description',
    ];
}
