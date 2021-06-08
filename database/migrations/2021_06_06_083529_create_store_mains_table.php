<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('store_mains'))
        {
        Schema::create('store_mains', function (Blueprint $table) {
            $table->increments('STORE_ID',11);
            $table->string('STORE_NAME',255)->nullable(); 
            $table->string('STORE_LINETOKEN',255)->nullable();
            $table->string('PER_ID',11)->nullable(); 
            $table->string('PER_NAME',255)->nullable();
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
        Schema::dropIfExists('store_mains');
    }
}
