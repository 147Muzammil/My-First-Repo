<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingTbale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('booking_name',50);
            $table->string('mobile_no',15);
            $table->string('email_id',50);
            $table->string('start_date',15);
            $table->string('end_date',15);
            $table->string('payment_status',10);
            $table->string('payment_paid',10);
            $table->string('pending_payment',10);
            $table->string('total_payment',20);
            $table->string('no_of_guest',10);
            $table->string('adons_id',10);
            $table->string('villa_id',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_tabel');
    }
}
