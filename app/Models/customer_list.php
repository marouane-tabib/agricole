<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'phone',
        'id_card',
        'description',
        'credit',
        'fc_max',
    ];
}
