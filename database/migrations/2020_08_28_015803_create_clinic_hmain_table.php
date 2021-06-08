<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicHmainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_hmain'))
        {
        Schema::create('clinic_hmain', function (Blueprint $table) {
            $table->bigIncrements('HMAIN_ID');
            $table->string('HMAIN_CODE')->nullable();
            $table->string('HMAIN_NAME')->nullable();
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
        Schema::dropIfExists('clinic_hmain');
    }
}
