<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_check'))
        {
        Schema::create('clinic_check', function (Blueprint $table) {
            $table->bigIncrements('CHECK_ID');
            $table->string('SYM_ID');    
            $table->string('CHECK_HIGHT')->nullable();  
            $table->string('CHECK_WEIGHT')->nullable();  
            $table->string('CHECK_HT')->nullable();  
            $table->string('CHECK_BP')->nullable();  
            $table->string('CHECK_TEMP')->nullable();  
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
        Schema::dropIfExists('clinic_check');
    }
}
