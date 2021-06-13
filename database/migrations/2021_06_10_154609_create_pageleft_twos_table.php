<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageleftTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pageleft_twos'))
        {
        Schema::create('pageleft_twos', function (Blueprint $table) {
            $table->increments('PAGE_LEFT_TWO_ID',11);
            $table->string('PAGE_LEFT_TWO_NAME',255)->nullable();      
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
        Schema::dropIfExists('pageleft_twos');
    }
}
