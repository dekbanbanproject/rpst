<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('page_groups'))
        {
        Schema::create('page_groups', function (Blueprint $table) {
            $table->increments('group_id',11);
            $table->string('group_name',255)->nullable(); 
            $table->mediumText('group_detail')->nullable();   
            $table->enum('status', ['true', 'false'])->default('false'); 
            $table->string('group_type',20)->nullable(); 
            $table->string('layout_id',11)->nullable(); 
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
        Schema::dropIfExists('page_groups');
    }
}
