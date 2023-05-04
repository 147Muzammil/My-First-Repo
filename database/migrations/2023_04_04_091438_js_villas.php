<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JsVillas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_villas', function (Blueprint $table) {
            $table->id();
            $table->string("name" ,50);
            $table->string("oneday_price", 80);
            $table->string("description")->nullable();
            $table->string("amenities" , 50);
            $table->string("tags" , 30);
            $table->string("base_image");
            $table->string("additional_images");
            $table->string("status" , 5);
            $table->string("guest_limit",10);
            $table->string("additional_guest_charge",10);
            $table->string("bullet_points",250);
            $table->string("actual_price",10);
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
        //
    }
}
