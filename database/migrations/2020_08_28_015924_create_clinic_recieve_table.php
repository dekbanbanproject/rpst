<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicRecieveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_recieve'))
        {
        Schema::create('clinic_recieve', function (Blueprint $table) {
            $table->bigIncrements('REC_ID');
            $table->string('REC_BILLNO')->unique();
            $table->string('REC_BILLPO');
            $table->date('REC_DATE', 0);
            $table->string('REC_YEAR');
            $table->string('REC_SUP')->nullable();
            $table->string('REC_STAFF')->nullable();
            $table->string('REC_LOCATE');
            $table->float('REC_TOTAL',10,2);         
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
        Schema::dropIfExists('clinic_recieve');
    }
}
