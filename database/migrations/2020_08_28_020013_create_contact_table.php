<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contact'))
        {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('CON_ID');
            $table->string('CON_NAME')->nullable();
            $table->string('CON_EMAIL')->unique();
            $table->string('CON_TEL')->nullable();
            $table->string('CON_SUBJECT')->nullable();
            $table->string('CON_MESSAGE')->nullable();
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
       
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
        Schema::dropIfExists('contact');
    }
}
