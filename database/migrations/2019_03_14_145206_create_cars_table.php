<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_number');
            $table->string('owner_name');
            $table->string('region_name');
            $table->string('brand_name');
            $table->string('model_name');
            $table->string('transmission_name');
            $table->unsignedInteger('road_accidents_count')->default(0);
            $table->unsignedInteger('fines_count')->default(0);
            $table->dateTime('last_service_at');
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
        Schema::dropIfExists('cars');
    }
}
