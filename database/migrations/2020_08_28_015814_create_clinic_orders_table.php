<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_orders'))
        {
        Schema::create('clinic_orders', function (Blueprint $table) {
            $table->bigIncrements('ORDER_ID');
            $table->string('ORDER_BILLNO')->unique();
            $table->string('ORDER_BILLPO');
            $table->date('ORDER_DATE', 0);
            $table->string('ORDER_YEAR')->nullable();
            $table->string('ORDER_SUP')->nullable();
            $table->string('ORDER_STAFF');
            $table->string('ORDER_APPROVER');
            $table->string('ORDER_STORE');
            $table->float('ORDER_TOTAL',10,2);
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
        Schema::dropIfExists('clinic_orders');
    }
}
