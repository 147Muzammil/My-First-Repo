<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaAddOnMapping extends Model
{
    use HasFactory;

    protected $table = 'villa_addon_mapping';
    protected $fillable = [
        'villa_id',
        'adons_id'
    ];
}
