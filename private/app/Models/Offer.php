<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'street',
        'house_number',
        'postal_code',
        'price',
        'surface',
    ];

}
