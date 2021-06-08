<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicSymDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinic_sym_detail'))
        {
        Schema::create('clinic_sym_detail', function (Blueprint $table) {
            $table->bigIncrements('SYM_DETAIL_ID');
            $table->string('SYM_ID');    
            $table->string('SYM_DETAIL_DRUGID')->nullable();  
            $table->string('SYM_DETAIL_DRUGNAME')->nullable();  
            $table->string('SYM_DETAIL_DRUGQTY')->nullable();  
            $table->string('SYM_DETAIL_DRUGUNIT')->nullable();  
            $table->float('SYM_DETAIL_DRUGPRICE',10,2);
            $table->float('SYM_DETAIL_TOTALPRICE',10,2);       
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
        Schema::dropIfExists('clinic_sym_detail');
    }
}
