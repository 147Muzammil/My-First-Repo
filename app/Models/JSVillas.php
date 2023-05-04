<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JSVillas extends Model
{
    use HasFactory;

    protected $table = 'js_villas';
    protected $fillable = [
        'name',
        'oneday_price',
        'description',
        'amenities',
        'tags',
        'base_image',
        'additional_images',
        'status',
        'guest_limit',
        'additional_guest_charge',
        'bullet_points',
        'actual_price',
        'location',
        'video',
        'video_url',
        'amenities_id',
        'add_ons_id'
    ];
}
