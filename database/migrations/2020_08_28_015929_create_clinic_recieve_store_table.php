<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicRecieveStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_recieve_store'))
        {
        Schema::create('clinic_recieve_store', function (Blueprint $table) {
            $table->bigIncrements('STORE_RECIEVE_ID');
            $table->string('REC_ID')->unique();
            $table->string('STORE_RECIEVE_DRUG_ID');
            $table->string('STORE_RECIEVE_DRUG_CODE')->nullable();
            $table->string('STORE_RECIEVE_DRUG_NAME')->nullable();
            $table->string('STORE_RECIEVE_DRUG_UNIT')->nullable();
            $table->string('STORE_RECIEVE_DRUG_QTY')->nullable();
            $table->float('STORE_RECIEVE_DRUG_PRICE',10,2);
            $table->string('STORE_RECIEVE_DRUG_LOT')->nullable();
            $table->float('STORE_RECIEVE_DRUG_TOTAL',10,2);
            $table->string('STORE_LOCATE_ID')->nullable();
            $table->date('STORE_RECIEVE_DRUG_DATE_BEGIN', 0);
            $table->date('STORE_RECIEVE_DRUG_DATE_EXP', 0);
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
        Schema::dropIfExists('clinic_recieve_store');
    }
}
