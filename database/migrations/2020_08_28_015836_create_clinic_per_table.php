<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicPerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_per'))
        {
        Schema::create('clinic_per', function (Blueprint $table) {
            $table->bigIncrements('PER_ID');
            $table->string('PER_CID')->unique();
            $table->string('PER_PNAME');
            $table->string('PER_FNAME')->nullable();
            $table->string('PER_LNAME')->nullable();
            $table->string('PER_TEL');
            $table->string('PER_AGE');
            $table->string('SIT_ID');
            $table->binary('PER_IMG')->nullable();
            $table->string('STATUS');
            $table->string('PER_QU');
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
        Schema::dropIfExists('clinic_per');
    }
}
