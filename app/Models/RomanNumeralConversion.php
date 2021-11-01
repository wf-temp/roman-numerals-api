<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RomanNumeralConversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'arabic_numeral',
        'roman_numeral',
        'count',
        'created_at',
        'updated_at'
    ];

}
