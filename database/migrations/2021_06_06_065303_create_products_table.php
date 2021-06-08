<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products'))
        {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('PRO_ID',11);
            $table->string('PRO_CODE',13)->nullable(); 
            $table->string('PRO_NAME',255)->nullable(); 
            $table->string('PRO_QTY',255)->nullable(); 
            $table->string('PRO_UNIT',255)->nullable(); 
            $table->string('PRO_CAT',255)->nullable();
            $table->binary('PRO_PIC')->nullable(); 
            $table->float("PRO_PRICE", 8, 2)->nullable(); 
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
        Schema::dropIfExists('products');
    }
}
