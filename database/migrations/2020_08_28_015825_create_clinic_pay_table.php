<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_pay'))
        {
        Schema::create('clinic_pay', function (Blueprint $table) {
            $table->bigIncrements('PAY_ID');
            $table->string('PAY_BILLNO')->unique();
            $table->string('PAY_BILL_ORDERS');
            $table->date('PAY_DATE', 0);
            $table->string('PAY_STAFF')->nullable();
            $table->string('PAY_USER')->nullable();
            $table->string('PAY_APPROVER');
            $table->string('PAY_STORE');
            $table->string('PAY_STORE_STAFF');
            $table->float('PAY_TOTAL',10,2);
            $table->string('PAY_YEAR');
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
        Schema::dropIfExists('clinic_pay');
    }
}
