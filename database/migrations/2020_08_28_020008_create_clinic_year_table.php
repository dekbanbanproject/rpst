<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_year'))
        {
        Schema::create('clinic_year', function (Blueprint $table) {
            $table->bigIncrements('YEAR_ID');
            $table->string('YEAR_NAME')->nullable(); 
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
        Schema::dropIfExists('clinic_year');
    }
}
