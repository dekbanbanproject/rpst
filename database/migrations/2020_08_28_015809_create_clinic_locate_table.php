<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicLocateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_locate'))
        {
        Schema::create('clinic_locate', function (Blueprint $table) {
            $table->bigIncrements('LOCATE_ID');
            $table->string('LOCATE_CODE')->nullable();
            $table->string('LOCATE_NAME')->nullable();
            $table->string('LOCATE_TUMBON')->nullable();
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
        Schema::dropIfExists('clinic_locate');
    }
}
