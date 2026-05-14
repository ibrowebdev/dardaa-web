<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'step1_services',
        'step2_details',
        'name',
        'company',
        'email',
        'phone',
        'source',
    ];

    protected function casts(): array
    {
        return [
            'step1_services' => 'array',
            'step2_details' => 'array',
        ];
    }
}
