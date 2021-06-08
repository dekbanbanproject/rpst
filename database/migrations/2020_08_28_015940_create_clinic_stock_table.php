<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_stock'))
        {
        Schema::create('clinic_stock', function (Blueprint $table) {
            $table->bigIncrements('STOCK_ID');
            $table->string('STOCK_DRUG_ID')->nullable();
            $table->string('STOCK_DRUG_NAME')->nullable();
            $table->string('STOCK_QTY')->nullable();
            $table->string('STOCK_RECIEVE')->nullable();
            $table->string('STOCK_PAY')->nullable();
            $table->float('STOCK_TOTALL',10,2);
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
        Schema::dropIfExists('clinic_stock');
    }
}
