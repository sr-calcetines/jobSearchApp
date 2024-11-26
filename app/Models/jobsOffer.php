<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobsOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise',
        'position',
        'state',
    ];
}
