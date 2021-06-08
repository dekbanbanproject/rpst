<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicOrdersDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_orders_detail'))
        {
        Schema::create('clinic_orders_detail', function (Blueprint $table) {
            $table->bigIncrements('ORDER_DETAIL_ID');
            $table->string('ORDER_ID')->unique();
            $table->string('ORDER_DETAIL_DRUG_ID');
            $table->string('ORDER_DETAIL_DRUG_CODE')->nullable();
            $table->string('ORDER_DETAIL_DRUG_NAME')->nullable();
            $table->string('ORDER_DETAIL_DRUG_UNIT')->nullable();
            $table->string('ORDER_DETAIL_DRUG_QTY')->nullable();
            $table->float('ORDER_DETAIL_DRUG_PRICE',10,2);
            $table->float('ORDER_DETAIL_DRUG_TOTAL',10,2);
            $table->string('ORDER_DETAIL_STORE')->nullable();
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
        Schema::dropIfExists('clinic_orders_detail');
    }
}
