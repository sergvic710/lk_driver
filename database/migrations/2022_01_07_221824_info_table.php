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
            $table->string('DriverID');
            $table->string('DriverName');
            $table->string('RouteNumberInContract');
            $table->string('RouteName');
            $table->string('BranchName');
            $table->string('VehicleRegNum');
            $table->string('VehicleModelName');
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
