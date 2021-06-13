<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageleftmoduleSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      
        if (!Schema::hasTable('pageleftmodule_subs'))
        {
        Schema::create('pageleftmodule_subs', function (Blueprint $table) {
            $table->increments('modulsub_id',11);
            $table->string('modulsub_name',255)->nullable();  
            $table->mediumText('modulsub_detail')->nullable();  
            $table->string('modulsub_img');  
            $table->string('module_id',11)->nullable();    
            $table->string('module_name',255)->nullable();       
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
        Schema::dropIfExists('pageleftmodule_subs');
    }
}
