<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('contacts'))
        {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('con_id',11);
            $table->string('con_name',255)->nullable(); 
            $table->string('con_tel',255)->nullable(); 
            $table->string('con_title',255)->nullable(); 
            $table->mediumText('con_message')->nullable(); 
            $table->string('con_email',11)->nullable();   
            $table->enum('status', ['true', 'false'])->default('true');             
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
        Schema::dropIfExists('contacts');
    }
}
