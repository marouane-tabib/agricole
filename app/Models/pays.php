<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier',
        'price',
        'check_number',
        'date',
        'credit',
    ];
}
