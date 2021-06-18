<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('qualities'))
        {
        Schema::create('qualities', function (Blueprint $table) {
            $table->increments('quality_id',11);
            $table->string('quality_name',255)->nullable(); 
            $table->string('quality_namesub',255)->nullable(); 
            $table->mediumText('quality_detail')->nullable();   
            $table->enum('status', ['true', 'false'])->default('false'); 
            $table->string('group_id',11)->nullable(); 
            $table->string('group_name',255)->nullable();
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
        Schema::dropIfExists('qualities');
    }
}
