<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageleftmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('pageleftmodules'))
        {
        Schema::create('pageleftmodules', function (Blueprint $table) {
            $table->increments('module_id',11);
            $table->string('module_name',255)->nullable(); 
            $table->mediumText('module_detail')->nullable();   
            $table->enum('status', ['true', 'false'])->default('false'); 
            $table->string('group_id',11)->nullable(); 
            $table->string('group_name',255)->nullable();
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
        Schema::dropIfExists('pageleftmodules');
    }
}
