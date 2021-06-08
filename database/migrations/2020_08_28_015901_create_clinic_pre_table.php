<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicPreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_pre'))
        {
        Schema::create('clinic_pre', function (Blueprint $table) {
            $table->bigIncrements('PRE_ID');
            $table->set('PRE_NAME',[
                'เด็กชาย','เด็กหญิง','นาย','นางสาว'
                ]);
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
        Schema::dropIfExists('clinic_pre');
    }
}
