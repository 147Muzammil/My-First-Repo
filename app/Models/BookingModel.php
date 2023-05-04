<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'booking_tabel';

    protected $fillable = [
        'booking_name',
        'mobile_no',
        'email_id',
        'start_date',
        'end_date',
        'payment_status',
        'payment_paid',
        'pending_payment',
        'total_payment',
        'no_of_guest',
        'adons_id',
        'villa_id'
    ];
}
