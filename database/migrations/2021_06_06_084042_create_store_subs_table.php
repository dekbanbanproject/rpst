<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('store_subs'))
        {
        Schema::create('store_subs', function (Blueprint $table) {
            $table->increments('STORE_SUB_ID',11);
            $table->string('STORE_SUB_NAME',255)->nullable(); 
            $table->string('STORE_SUB_LINETOKEN',255)->nullable();
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
        Schema::dropIfExists('store_subs');
    }
}
