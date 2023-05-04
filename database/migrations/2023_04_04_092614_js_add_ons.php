<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JsAddOns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_add_ons', function (Blueprint $table) {
            $table->id();
            $table->string("villa_id", 10);
            $table->string("title", 80);
            $table->string("add_on_label", 250);
            $table->string("add_on_description", 500);
            $table->string("add_on_price", 30);
            $table->string("status", 10);
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
