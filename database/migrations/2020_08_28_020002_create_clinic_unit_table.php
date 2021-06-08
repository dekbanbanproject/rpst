<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_unit'))
        {
        Schema::create('clinic_unit', function (Blueprint $table) {
            $table->bigIncrements('UNIT_ID');
            $table->string('UNIT_NAME')->nullable();           
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
        });
    }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_unit');
    }
}
