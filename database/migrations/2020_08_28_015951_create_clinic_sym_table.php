<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicSymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_sym'))
        {
        Schema::create('clinic_sym', function (Blueprint $table) {
            $table->bigIncrements('SYM_ID');          
            $table->string('PER_ID');
            $table->date('SYM_DATE', 0)->nullable();
            $table->time('SYM_TIME')->nullable();
            $table->string('SYM_DRUG_ALLERGY')->nullable();
            $table->string('SYM_ROKE')->nullable();
            $table->string('SYM_AKAN')->nullable();
            $table->string('SYM_DIAG')->nullable();
            $table->float('SYM_SUMTOTALPRICE',12,2);
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
        Schema::dropIfExists('clinic_sym');
    }
}
