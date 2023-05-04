<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;

    protected $table = 'days_table';
    protected $fillable = [
        'days',
        'standard_price',
        'actual_price',
        'villa_id'
    ];
}
