<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_supplier'))
        {
        Schema::create('clinic_supplier', function (Blueprint $table) {
            $table->bigIncrements('SUP_ID');
            $table->string('SUP_NAME')->nullable();
            $table->string('SUP_TEL')->nullable();
            $table->string('SUP_ADDRESS')->nullable();
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
        Schema::dropIfExists('clinic_supplier');
    }
}
