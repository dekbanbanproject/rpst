<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_drug'))
        {
        Schema::create('clinic_drug', function (Blueprint $table) {
            $table->bigIncrements('DRUG_ID');
            $table->string('DRUG_CODE')->unique();
            $table->string('DRUG_NAME');
            $table->text('DRUG_STRENGTH')->nullable();
            $table->string('DRUG_UNIT')->nullable();
            $table->binary('DRUG_IMG')->nullable();
            $table->float('DRUG_UNIT_PRICE',10,2);
            $table->float('DRUG_UNIT_PRICE_COST',10,2);
            $table->string('DRUG_STORE')->nullable();
            $table->string('DRUG_DID')->nullable();
            $table->text('THERAPEUTIC')->nullable();
            $table->boolean('STATUS')->default(true);
            $table->string('CAT_ID');
            $table->string('DRUG_RECIEVE_QTY')->nullable();
            $table->string('DRUG_RECIEVE_QTY_UPDATE')->nullable();
            $table->float('DRUG_SYM_PAY',10,2);
            $table->string('DRUG_PAY_QTY_UPDATE')->nullable();
            $table->float('DRUG_TOTAL',10,2);
            $table->timestamps();
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
        Schema::dropIfExists('clinic_drug');
    }
}
