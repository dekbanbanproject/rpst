<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageleftOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        if (!Schema::hasTable('pageleft_ones'))
        {
        Schema::create('pageleft_ones', function (Blueprint $table) {
            $table->increments('PAGE_LEFT_ONE_ID',11);
            $table->string('PAGE_LEFT_ONE_NAME',255)->nullable();           
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
        Schema::dropIfExists('pageleft_ones');
    }
}
