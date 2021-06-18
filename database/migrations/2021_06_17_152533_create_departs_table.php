<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('departs'))
        {
        Schema::create('departs', function (Blueprint $table) {
            $table->increments('departs_id',11);
            $table->string('departs_name',255)->nullable();  
            $table->string('departs_token',255)->nullable(); 
            $table->enum('status', ['true', 'false'])->default('false');             
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
        Schema::dropIfExists('departs');
    }
}
