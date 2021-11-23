<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factures extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'supplier',
        'product',
        'quantity',
        'price',
        'payment',
        'credit',
        'total',
        'fc_id',
        'taype',
    ];
}
