<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trip_title');
            $table->integer('user_id');
            $table->string('cost');
            $table->string('description');
            $table->string('photo');
            $table->date('trip_start_date');
            $table->date('trip_end_date');
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
        Schema::dropIfExists('trip_plans');
    }
}
