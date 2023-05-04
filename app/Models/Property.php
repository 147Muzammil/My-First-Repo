<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property_tabel';
    protected $fillable = [
        'property_name',
        'email_id',
        'whatsapp_no',
        'property_images'
    ];
}
