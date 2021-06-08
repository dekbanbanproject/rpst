<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicPerStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_per_status'))
        {
        Schema::create('clinic_per_status', function (Blueprint $table) {
            $table->bigIncrements('STATUS_ID');
            $table->set('STATUS_NAME_EN', ['PAID', 'UNPAID','OVERDUE']);
            $table->set('STATUS_NAME_TH', ['ชำระแล้ว', 'ยังไม่ชำระ','ค้างชำระ']);
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
        Schema::dropIfExists('clinic_per_status');
    }
}
