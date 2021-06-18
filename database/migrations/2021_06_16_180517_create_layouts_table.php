<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      
        if (!Schema::hasTable('layouts'))
        {
        Schema::create('layouts', function (Blueprint $table) {
            $table->increments('layout_id',11);
            $table->string('layout_name',255)->nullable(); 
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
        Schema::dropIfExists('layouts');
    }
}
