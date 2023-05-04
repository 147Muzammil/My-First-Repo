<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsAddOnsModel extends Model
{
    use HasFactory;
    protected $table = 'js_add_ons';
    protected $fillable = [
        'villa_id',
        'title',
        'add_on_label',
        'add_on_description',
        'add_on_price',
        'status'
    ];
}
