<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('DriverID')->default('');
            $table->string('DriverName')->default('');;
            $table->string('RouteNumberInContract')->default('');;
            $table->string('RouteName')->default('');;
            $table->string('BranchName')->default('');;
            $table->string('AutoColumnName')->default('');;
            $table->string('VehicleRegNum')->default('');;
            $table->string('VehicleModelName')->default('');;
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
        Schema::dropIfExists('info');
    }
}
