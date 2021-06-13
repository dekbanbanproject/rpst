<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageleftFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pageleft_fours'))
        {
        Schema::create('pageleft_fours', function (Blueprint $table) {
            $table->increments('PAGE_LEFT_FOUR_ID',11);
            $table->string('PAGE_LEFT_FOUR_NAME',255)->nullable();      
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
        Schema::dropIfExists('pageleft_fours');
    }
}
