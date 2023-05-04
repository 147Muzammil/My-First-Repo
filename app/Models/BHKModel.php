<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BHKModel extends Model
{
    use HasFactory;

    protected $table = 'bhk';
    protected $fillable = [
        'bhk_room'
    ];
}
