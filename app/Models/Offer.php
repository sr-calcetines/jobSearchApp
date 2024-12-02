<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'enterprise',
        'position',
        'state',
    ];
//One to many relation with follow table
    public function follows(){
        return $this->hasMany(Follow::class);
    }
}
