<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'quantity',
        'image',
        'price'
    ];
}